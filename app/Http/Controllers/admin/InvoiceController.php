<?php

namespace App\Http\Controllers\admin;

use App\Exports\ExportInvoice;
use App\Http\Controllers\Controller;
use App\Models\{customerUser, CustTicket, Invoice, Service, User};
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Razorpay\Api\Api;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:invoice-list|invoice-create|invoice-edit|invoice-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:invoice-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:invoice-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:invoice-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $Invoicelist = Invoice::orderBy('id', 'DESC')->get();
        $users = User::latest()->get();
        return view('admin.Invoice.show', compact('Invoicelist','users'));
    }

    public function create()
    {
        $customers = customerUser::orderBy('name', 'ASC')->get();
        $tickets = CustTicket::orderBy('id', 'ASC')->get();
        $controller_access = new TicketController();
        $inv_id = $controller_access->invoiceNumber();
        $services = Service::select('id', 'ser_name')->orderBy('ser_name', 'ASC')->get();
        return view('admin.Invoice.create', compact('services', 'inv_id', 'customers', 'tickets'));
    }

    public function getCustomerAdd($id)
    {
        $custAdd = customerUser::select('add1', 'add2', 'gst')->where('id', $id)->get();
        return response()->json($custAdd);
    }

    public function export()
    {
        $getData = Invoice::select('inv_id', 'cust_name', 'address', 'service_name', 'inv_date', 'inv_total_amt', 'payment_type', 'payment_status')->get();
        $result = [];
        foreach ($getData as $value) {
            $decodedSrvName = json_decode($value->service_name);
            foreach ($decodedSrvName as $values) {
                $getSrvName = Service::select('ser_name')->where('id', $values)->get();
                $srvArray['inv_id'] = $value->inv_id;
                $srvArray['cust_name'] = $value->cust_name;
                $srvArray['address'] = $value->address;
                $srvArray['service_name'] = $getSrvName[0]['ser_name'];
                $srvArray['inv_date'] = $value->inv_date;
                $srvArray['inv_total_amt'] = $value->inv_total_amt;
                $srvArray['payment_type'] = $value->payment_type;
                $srvArray['payment_status'] = $value->payment_status;
                array_push($result, $srvArray);
            }
        }
        return Excel::download(new ExportInvoice($result), 'invoice.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rzpConfirm' => 'required'
        ], [
            'rzpConfirm.required' => 'Please select option'
        ]);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $getCustomerData = customerUser::where('id', $request->cust_name)->first();
        if ($request->rzpConfirm == 1) {
            $rzpayApi = $api->paymentLink->create([
                'amount' => $request->tot_amt * 100,
                'currency' => 'INR',
                'accept_partial' => false,
                'first_min_partial_amount' => null,
                'description' => 'For purchasing services',
                'customer' => (['name' => $getCustomerData->name, 'email' => $getCustomerData->email, 'contact' => $getCustomerData->mobile]),
                'notify' => (['sms' => true, 'email' => true]),
                'reminder_enable' => false,
                'notes' => (['autogenkey' => $request->inv_no]),
                'callback_url' => "" . Config('app.url') . "thankyouStore",
                'callback_method' => 'get'
            ]);
            $invoiceData = new Invoice();
            $invoiceData->inv_id = $request->inv_no;
            $invoiceData->tkt_id  = $request->tkt_id;
            $invoiceData->customer_user_id = $request->cust_name;
            $invoiceData->cust_name = $getCustomerData->name;
            $invoiceData->inv_amt = json_encode($request->inv_amt);
            $invoiceData->gst = $request->gst;
            $invoiceData->inv_date = $request->date;
            $invoiceData->address = $request->add;
            $invoiceData->staticData = $request->staticData;
            $invoiceData->service_name = json_encode($request->srv_name);
            $invoiceData->service_desc = json_encode($request->srv_desc);
            $invoiceData->pay_via_rzpay = $request->rzpConfirm;
            $invoiceData->inv_total_amt = $request->tot_amt;
            $invoiceData->terms_and_condi = $request->terms_condi;
            $invoiceData->staticBankData = $request->staticBankData;
            $invoiceData->rzpayUrl = $rzpayApi['short_url'];
            $invoiceData->save();
        } else {
            $invoiceData = new Invoice();
            $invoiceData->inv_id = $request->inv_no;
            $invoiceData->tkt_id  = $request->tkt_id;
            $invoiceData->customer_user_id = $request->cust_name;
            $invoiceData->cust_name = $getCustomerData->name;
            $invoiceData->inv_amt = json_encode($request->inv_amt);
            $invoiceData->gst = $request->gst;
            $invoiceData->inv_date = $request->date;
            $invoiceData->address = $request->add;
            $invoiceData->staticData = $request->staticData;
            $invoiceData->service_name = json_encode($request->srv_name);
            $invoiceData->service_desc = json_encode($request->srv_desc);
            $invoiceData->pay_via_rzpay = $request->rzpConfirm;
            $invoiceData->inv_total_amt = $request->tot_amt;
            $invoiceData->terms_and_condi = $request->terms_condi;
            $invoiceData->staticBankData = $request->staticBankData;
            $invoiceData->rzpayUrl = '';
            $invoiceData->save();
        }
        return redirect(route('admin.invoice.list'))->with('success', 'Invoice created successfully.');
    }

    public function Show($id)
    {
        $fetchData = Invoice::where('id', $id)->first();
        return view('admin.Invoice.view', compact('fetchData'));
    }

    public function edit($id)
    {
        $customers = customerUser::orderBy('name', 'ASC')->get();
        $getInvoiceData = Invoice::where('id', $id)->first();
        $tickets = CustTicket::orderBy('id', 'ASC')->get();
        $services = Service::select('id', 'ser_name')->orderBy('ser_name', 'ASC')->get();
        return view('admin.Invoice.edit', compact('getInvoiceData', 'customers', 'tickets', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'rzpConfirm' => 'required'
        ], [
            'rzpConfirm.required' => 'Please select option'
        ]);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $getCustomerData = customerUser::where('id', $request->cust_name)->first();
        if ($request->rzpConfirm == 1) {
            $rzpayApi = $api->paymentLink->create([
                'amount' => $request->tot_amt * 100,
                'currency' => 'INR',
                'accept_partial' => false,
                'first_min_partial_amount' => null,
                'description' => 'For XYZ purpose',
                'customer' => (['name' => $getCustomerData->name, 'email' => $getCustomerData->email, 'contact' => $getCustomerData->mobile]),
                'notify' => (['sms' => true, 'email' => true]),
                'reminder_enable' => false,
                'notes' => (['autogenkey' => $request->inv_id]),
                'callback_url' => "" . Config('app.url') . "thankyou",
                'callback_method' => 'get'
            ]);
            $fetchData = Invoice::find($id);
            $fetchData->inv_id = $request->inv_no;
            $fetchData->tkt_id = $request->tkt_id;
            $fetchData->inv_date = $request->date;
            $fetchData->staticData = $request->staticData;
            $fetchData->customer_user_id  = $request->cust_name;
            $fetchData->cust_name = $getCustomerData->name;
            $fetchData->gst = $request->gst;
            $fetchData->address = $request->add;
            $fetchData->service_name = json_encode($request->srv_name);
            $fetchData->service_desc = json_encode($request->srv_desc);
            $fetchData->inv_amt = json_encode($request->inv_amt);
            $fetchData->pay_via_rzpay = $request->rzpConfirm;
            $fetchData->inv_total_amt = $request->tot_amt;
            $fetchData->terms_and_condi = $request->terms_condi;
            $fetchData->staticBankData = $request->staticBankData;
            $fetchData->rzpayUrl = $rzpayApi['short_url'];
            $fetchData->save();
        } else {
            $fetchData = Invoice::find($id);
            $fetchData->inv_id = $request->inv_no;
            $fetchData->tkt_id = $request->tkt_id;
            $fetchData->inv_date = $request->date;
            $fetchData->staticData = $request->staticData;
            $fetchData->customer_user_id  = $request->cust_name;
            $fetchData->cust_name = $getCustomerData->name;
            $fetchData->gst = $request->gst;
            $fetchData->address = $request->add;
            $fetchData->service_name = json_encode($request->srv_name);
            $fetchData->service_desc = json_encode($request->srv_desc);
            $fetchData->inv_amt = json_encode($request->inv_amt);
            $fetchData->pay_via_rzpay = $request->rzpConfirm;
            $fetchData->inv_total_amt = $request->tot_amt;
            $fetchData->terms_and_condi = $request->terms_condi;
            $fetchData->staticBankData = $request->staticBankData;
            $fetchData->rzpayUrl = '';
            $fetchData->save();
        }
        return redirect(route('admin.invoice.list'))->with('success', 'Invoice Updated successfully.');
    }

    public function destroy($id)
    {
        Invoice::where('id', $id)->update([
            'payment_status' => 'Cancelled'
        ]);
        return redirect()->back()->with('success', 'Invoice Cancelled Successfully');
    }

    public function generateInvoice(Request $request, $id, $custid)
    {
        $request->validate([
            'rzpConfirm' => 'required'
        ], [
            'rzpConfirm.required' => 'Please select option'
        ]);
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        $getCustomerData = customerUser::where('id', $custid)->first();
        if ($request->rzpConfirm == 1) {
            $rzpayApi = $api->paymentLink->create([
                'amount' => $request->tot_amt * 100,
                'currency' => 'INR',
                'accept_partial' => false,
                'first_min_partial_amount' => null,
                'description' => 'For XYZ purpose',
                'customer' => (['name' => $getCustomerData->name, 'email' => $getCustomerData->email, 'contact' => $getCustomerData->mobile]),
                'notify' => (['sms' => true, 'email' => true]),
                'reminder_enable' => false,
                'notes' => (['autogenkey' => $request->inv_id]),
                'callback_url' => "" . Config('app.url') . "thankyou",
                'callback_method' => 'get'
            ]);
            $fetchData = new Invoice();
            $fetchData->inv_id = $request->inv_id;
            $fetchData->tkt_id  = $id;
            $fetchData->inv_date = $request->inv_date;
            $fetchData->staticData = $request->staticData;
            $fetchData->customer_user_id  = $custid;
            $fetchData->cust_name = $getCustomerData->name;
            $fetchData->gst = $request->gst;
            $fetchData->address = $request->add;
            $fetchData->service_name = json_encode($request->srv_name);
            $fetchData->service_desc = json_encode($request->srv_desc);
            $fetchData->inv_amt = json_encode($request->inv_amt);
            $fetchData->pay_via_rzpay = $request->rzpConfirm;
            $fetchData->inv_total_amt = $request->tot_amt;
            $fetchData->terms_and_condi = $request->terms_condi;
            $fetchData->staticBankData = $request->staticBankData;
            $fetchData->rzpayUrl = $rzpayApi['short_url'];
            $fetchData->save();
        } else {
            $fetchData = new Invoice();
            $fetchData->inv_id = $request->inv_id;
            $fetchData->tkt_id  = $id;
            $fetchData->inv_date = $request->inv_date;
            $fetchData->staticData = $request->staticData;
            $fetchData->customer_user_id = $custid;
            $fetchData->cust_name = $getCustomerData->name;
            $fetchData->gst = $request->gst;
            $fetchData->address = $request->add;
            $fetchData->service_name = json_encode($request->srv_name);
            $fetchData->service_desc = json_encode($request->srv_desc);
            $fetchData->inv_amt = json_encode($request->inv_amt);
            $fetchData->pay_via_rzpay = $request->rzpConfirm;
            $fetchData->inv_total_amt = $request->tot_amt;
            $fetchData->terms_and_condi = $request->terms_condi;
            $fetchData->staticBankData = $request->staticBankData;
            $fetchData->rzpayUrl = '';
            $fetchData->save();
        }
        return redirect(route('admin.invoice.list'))->with('success', 'Invoice generated successfully.');
    }

    public function generatePdf($id)
    {
        $fetchData = Invoice::findOrFail($id);
        $data = [
            'fetchData' => $fetchData
        ];
        PDF::setOptions(['dpi' => 150, 'defaultFont' => 'roboto'])->setPaper('a4', 'portrait');
        $pdf =  PDF::loadView('admin.Invoice.mypdf', $data);
        return $pdf->download('invoice' . $fetchData->inv_id . '.pdf');
    }

    public function aspaid(Request $request)
    {
        Invoice::where('id', $request->invc_id)->update([
            'customer_user_id' => $request->invc_cust_id,
            'cust_name' => $request->invc_user,
            'payment_type' => 'Bank',
            'payment_status' => 'Paid'
        ]);
        return response()->json(['success' => 'Invoice No. ' . $request->invc_id . ' updated successfully.']);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{CustTicket, Invoice, Message, Service, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ticket-list|ticket-create|ticket-edit|ticket-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:ticket-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:ticket-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:ticket-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $users = User::where('is_admin', '!=', '1')->get();
        $user = auth()->guard('web')->user()->id;

        if (auth()->guard('web')->user()->is_admin === 1) {
            $ticketList = DB::table('cust_tickets')
                ->select('cust_tickets.*', 'customer_users.name as customer_name')
                ->join('customer_users', 'cust_tickets.customer_user_id', '=', 'customer_users.id')
                ->join('services', 'cust_tickets.service_id', '=', 'services.id')
                ->get();
        } else {
            $ticketList = DB::table('cust_tickets')
                ->select('cust_tickets.*', 'customer_users.name as customer_name', 'services.ser_name as service_name')
                ->join('customer_users', 'cust_tickets.customer_user_id', '=', 'customer_users.id')
                ->join('services', 'cust_tickets.service_id', '=', 'services.id')
                ->ORDERBY('cust_tickets.id')->where('cust_tickets.user_id', $user)->get();
        }
        return view('admin.Ticket.index', compact('ticketList', 'users'));
    }

    public function create(Request $request, $id)
    {
        $reply = CustTicket::with('users', 'services')->find($id);
        return view('admin.Ticket.reply', compact('reply'));
    }

    public function changeStatus(Request $request)
    {
        $ticketStatus = CustTicket::find($request->ticket_id);
        $ticketStatus->status = $request->status;
        $ticketStatus->update();
        return response()->json(['success' => 'Ticket Status change successfully.']);
    }

    public function showTicketStatusData($status)
    {
        $showTicketStatus = CustTicket::where('status', $status)->get();
        return response()->json($showTicketStatus);
    }

    public function assignTo(Request $request)
    {
        $getUserName = User::where('id', $request->user_select)->first();
        DB::table('cust_tickets')->where('id', $request->tkt_id)->update(['user_id' => $request->user_select, 'assign_name' => $getUserName->name]);
        return response()->json(['success' => 'Ticket assigned to <b>' . $getUserName->name . ' </b>successfully.']);
    }

    public function replyTo(Request $request)
    {
        $imageName = '';
        if ($request->hasfile('file')) {
            $image = $request->file('file');
            $ImageName = date('YmdHis') . "_" . $image->getClientOriginalName();
            $image->move(public_path() . '/images/ChatFile/', $ImageName);
            $imageName = $ImageName;
        }
        $chatData = new Message();
        $chatData->message = $request->chat_msg;
        $chatData->customer_user_id = $request->cust_user_id;
        $chatData->CustTicket_id = $request->tkt_id;
        $chatData->user_id = $request->user_id;
        $chatData->sender_id = auth()->guard('web')->user()->id;
        $chatData->receiver_id = $request->cust_user_id;
        $chatData->type = 'user';
        $chatData->file = $imageName;
        $chatData->created_at = now();
        $chatData->updated_at = now();
        $chatData->save();
        if ($chatData) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['failure' => false]);
        }
    }

    public function getMsgs(Request $request)
    {
        $data = DB::table('messages')
            ->select('messages.*', 'customer_users.name as customer_name', 'users.name as user_name')
            ->join('customer_users', 'messages.customer_user_id', '=', 'customer_users.id')
            ->join('users', 'messages.user_id', '=', 'users.id')
            ->where('customer_user_id', $request->cust_user_id)
            ->where('CustTicket_id', $request->tkt_id)
            // ->orwhere('user_id', $request->admin_id)
            // ->orwhere('user_id', $request->user_id)
            ->orderBy('id', 'ASC')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function getInvoice(Request $request, $tktid, $custid)
    {
        $services = Service::select('id', 'ser_name')->get();
        $fetchCustData = CustTicket::with('users', 'services')->find($tktid);
        $inv_id = $this->invoiceNumber();
        return view('admin.Ticket.getInvoice', compact('fetchCustData', 'inv_id', 'services', 'custid'));
    }

    function invoiceNumber()
    {
        $invoice_no = Invoice::all();

        if ($invoice_no->isEmpty()) {
            $invoice = '001';
            return $invoice;
        }

        foreach ($invoice_no as $invoice) {
            $latest = Invoice::latest()->first();
            if ($latest->inv_id == true) {
                $invoice = $latest->inv_id + 1;
                return '00' . $invoice;
            }
        }
    }
}

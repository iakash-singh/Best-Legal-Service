<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\customerUser;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:customer-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:customer-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $List = customerUser::latest()->get();
        return view('admin.Customer.list', compact('List'));
    }

    public function create()
    {
        return view('admin.Customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:customer_users,email',
            'gst' => 'nullable|alpha_num|max:15'
        ], [
            'name.required' => 'Customer Name is required',
            'email.required' => 'Customer Email Id is required',
            'email.email' => 'Email Id must include @ and .',
            'email.unique' => 'Email Id ' . $request->email . ' is already registered. Please use another email address.',
            'gst.alpha_num' => 'GST No should be in aplhanumeric characters',
            'gst.max' => 'GST No should be of 15 characters only',
        ]);

        $customerData = new customerUser();
        $customerData->name = ucwords($request->name);
        $customerData->email = $request->email;
        $customerData->add1 = (!empty($request->add1)) ? $request->add1 : '' ;
        $customerData->add2 = (!empty($request->add2)) ? $request->add2 : '';
        $customerData->gst = $request->gst;
        $customerData->alt_mobile = $request->mob2;
        $customerData->mobile = $request->mob1;
        $customerData->country = ucwords($request->ctry);
        $customerData->state = ucwords($request->state);
        $customerData->city = ucwords($request->city);
        $customerData->save();

        return redirect(route('admin.Customer.index'))->with('success', 'Customer created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $fetchCustomerData = customerUser::with('tickets')->find($id);
        return view('admin.Customer.edit', compact('fetchCustomerData'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'gst' => 'nullable|alpha_num|max:15'
        ], [
            'name.required' => 'Customer Name is required',
            'gst.alpha_num' => 'GST No should be in aplhanumeric characters',
            'gst.max' => 'GST No should be of 15 characters only',
        ]);

        customerUser::where('id', $id)->update([
            'name' => ucwords($request->name),
            'add1' => $request->add1,
            'add2' => $request->add2,
            'gst' => $request->gst,
            'alt_mobile' => $request->mob2,
            'country' => ucwords($request->ctry),
            'state' => ucwords($request->state),
            'city' => ucwords($request->city),
            'mobile' => $request->mob1
        ]);
        return redirect(route('admin.Customer.index'))->with('success', 'Customer updated successfully.');
    }

    public function destroy($id)
    {
        customerUser::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Customer Deleted Successfully');
    }
}

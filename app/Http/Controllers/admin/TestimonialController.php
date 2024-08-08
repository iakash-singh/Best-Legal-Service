<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Service, testimonial};
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:testimonial-list|testimonial-create|testimonial-edit|testimonial-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:testimonial-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:testimonial-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:testimonial-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $testiList = testimonial::select('id', 'name', 'address', 'content', 'service', 'status')->latest()->get();
        return view('admin.Testimonial.testimonialList', compact('testiList'));
    }

    public function create()
    {
        $services = Service::select('id', 'ser_name')->where('status', 1)->get();
        return view('admin.Testimonial.testimonialAdd', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'testi_name' => 'required',
            's_address' => 'required',
            'content' => 'required',
            'service' => 'required'
        ], [
            'testi_name.required' => 'Full Name is required',
            's_address.required' => "Short Address is required as 'Los Angeles, CA' ",
            'service.required' => 'Service selection is required',
            'content.required' => 'Content is required'
        ]);
        $testi = new testimonial();
        $testi->name = $request->testi_name;
        $testi->address = $request->s_address;
        $testi->content = $request->content;
        $testi->service = $request->service;
        $testi->save();
        return redirect(route('admin.Testimonial.index'))->with('success', 'Testimonial created successfully.');
    }

    public function edit($id)
    {
        $testi = testimonial::where('id', $id)->first();
        $services = Service::select('id', 'ser_name')->where('status', 1)->get();
        return view('admin.Testimonial.testimonialEdit', compact('testi', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'testi_name' => 'required',
            's_address' => 'required|max:150',
            'content' => 'required',
            'service' => 'required'
        ], [
            'testi_name.required' => 'Full Name is required',
            's_address.required' => "Short Address is required as 'Los Angeles, CA' ",
            'content.required' => 'Content is required',
            'service.required' => 'Service selection is required',
        ]);
        $testi = testimonial::find($id);
        $testi->name = $request->testi_name;
        $testi->address = $request->s_address;
        $testi->content = $request->content;
        $testi->service = $request->service;
        $testi->save();
        return redirect(route('admin.Testimonial.index'))->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testi = testimonial::find($id);
        $testi->delete();
        return redirect(route('admin.Testimonial.index'))->with('success', 'Testimonial Deleted Successfully');
    }

    public function changeStatus(Request $request)
    {
        $testiStatus = testimonial::find($request->testi_id);
        $testiStatus->status = $request->status;
        $testiStatus->save();
        return response()->json(['success' => 'Testimonial Status changed successfully.']);
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{category, Service};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:service-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $subCategory = category::with('sub_category')->get();
        $serviceList = Service::latest()->with('category:id,category_name')->get();
        return view('admin.Service.serviceList', compact('serviceList', 'subCategory'));
    }

    public function create()
    {
        $category = category::with('sub_category')->where('parents_id', NULL)->get();
        $subcat = category::with(['sub_category'])->get();
        return view('admin.Service.serviceAdd', compact('category', 'subcat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_name' => 'required',
            'ptitle' => 'required',
            'position' => 'nullable|integer|min:-2147483648|max:2147483647',
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif',
            'short_desc' => 'required',
            'meta_key' => 'required',
            'meta_desc' => 'required',
            'desc' => 'required',
            'service_category' => 'required',
            'service_subcat' => 'required',
            'price' => 'sometimes',
        ], [
            'service_name.required' => 'Service Name is required',
            'position.integer' => 'Position field must be a number only',
            'position.min' => 'Position field reached its minimum value',
            'position.max' => 'Position field reached its maximum value',
            'ptitle.required' => 'Product Title is required',
            'image.image' => 'Only Image Files are accepted!',
            'image.mimes' => 'Image Format should be:jpeg,png,jpg,gif',
            'short_desc.required' => 'Short Description is required',
            'meta_key.required' => 'Meta Keywords are required',
            'meta_desc.required' => 'Meta Description is required',
            'desc.required' => 'Description is required',
            'service_category.required' => 'Select Parent category is required',
            'service_subcat.required' => 'Select Sub-Category is required'
        ]);

        $imageName = '';
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $ImageName = date('YmdHis') . "_" .$image->getClientOriginalName();
            $image->move(public_path() . '/images/Service/', $ImageName);
            $imageName = $ImageName;
        }
        $service = new Service();
        $service->ser_name = $request->service_name;
        $service->title = $request->ptitle;
        $service->position = $request->position ? $request->position : 0;
        $service->image = $imageName;
        $service->short_description = $request->short_desc;
        $service->meta_keywords = $request->meta_key;
        $service->meta_description = $request->meta_desc;
        $service->description = $request->desc;
        $service->cat = $request->service_category;
        $service->sub_cat = $request->service_subcat;
        $service->price = $request->price;
        $service->save();
        return redirect()->route('admin.service.listService')->with('success', 'Service created successfully.');
    }

    public function edit(Service $slug)
    {
        $category = category::with('sub_category')->where('parents_id', NULL)->get();
        $subcat = category::with(['sub_category'])->get();
        return view('admin.Service.serviceEdit', compact('slug', 'category', 'subcat'));
    }

    public function update(Request $request, Service $slug)
    {
        $request->validate([
            'service_name' => 'required',
            'ptitle' => 'required',
            'position' => 'nullable|integer|min:-2147483648|max:2147483647',
            'short_desc' => 'required',
            'meta_key' => 'required',
            'meta_desc' => 'required',
            'desc' => 'required',
            'service_category' => 'required',
            'service_subcat' => 'required',
            'price' => 'sometimes',
        ], [
            'service_name.required' => 'Service Name is required',
            'ptitle.required' => 'Product Title is required',
            'position.integer' => 'Position field must be a number only',
            'position.min' => 'Position field reached its minimum value',
            'position.max' => 'Position field reached its maximum value',
            'short_desc.required' => 'Short Description is required',
            'meta_key.required' => 'Meta Keywords are required',
            'meta_desc.required' => 'Meta Description is required',
            'desc.required' => 'Description is required',
            'service_category.required' => 'Select Parent category is required',
            'service_subcat.required' => 'Select Sub-Category is required'
        ]);

        $imageName = '';
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            File::delete(public_path() . '/images/Service/' . $request->input('image'));
            $ImageName = date('YmdHis') . "_" . $image->getClientOriginalName();
            $image->move(public_path() . '/images/Service/', $ImageName);
            $imageName = $ImageName;
        } else {
            $imageName = $request->input('image');
        }

        $input['ser_name'] = $request->input('service_name');
        $input['title'] = $request->input('ptitle');
        $input['position'] = $request->position ? $request->position : 0;
        $input['image'] = $imageName;
        $input['description'] = $request->input('desc');
        $input['short_description'] = $request->input('short_desc');
        $input['meta_keywords'] = $request->input('meta_key');
        $input['meta_description'] = $request->input('meta_desc');
        $input['cat'] = $request->input('service_category');
        $input['sub_cat'] = $request->input('service_subcat');
        $input['price'] = $request->input('price');
        $slug->update($input);
        return redirect()->route('admin.service.listService')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $slug)
    {
        File::delete(public_path() . '/images/Service/' . $slug->image);
        $slug->delete();
        return redirect()->route('admin.service.listService')->with('success', 'Service deleted successfully.');
    }

    public function changeStatus(Request $request)
    {
        $serviceStatus = Service::find($request->service_id);
        $serviceStatus->status = $request->status;
        $serviceStatus->save();
        return response()->json(['success' => 'Service Status changed successfully.']);
    }

    public function changeCheckedService(Request $request)
    {
        $serviceChecked = Service::find($request->service_id);
        $serviceChecked->is_checked = $request->checked;
        $serviceChecked->save();
        return response()->json(['success' => 'Service Checked successfully.']);
    }

    public function onChangeSubCategory($id)
    {
        $subCat = category::where('parents_id', $id)->get();
        return response()->json($subCat);
    }
}

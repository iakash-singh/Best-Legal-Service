<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:service-category-list|service-category-create|service-category-edit|service-category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:service-category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:service-category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:service-category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categories = category::latest()->with(['sub_category' => function ($category) {
            $category->select('id', 'category_name', 'parents_id', 'status', 'position');
        }])->whereNull('parents_id')->get();
        return view('admin.Category.show', compact('categories'));
    }

    public function create()
    {
        $categories = category::with('sub_category')->whereNull('parents_id')->get();
        return view('admin.Category.category', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'parent_id' => 'sometimes|nullable|numeric',
            'position' => 'nullable|integer|min:-2147483648|max:2147483647'
        ], [
            'name.required' => 'Category Name is required',
            'position.integer' => 'Position field must be a number only',
            'position.min' => 'Position field reached its minimum value',
            'position.max' => 'Position field reached its maximum value',
        ]);
        $category = new category();
        $category->category_name = $request->name;
        $category->parents_id = $request->parent_id;
        $category->position = $request->position ? $request->position : 0;
        $category->save();

        return redirect()->route('admin.ServiceCategory.index')->with('success', 'Category created successfully');
    }

    public function edit($id)
    {
        $category = category::where('id', $id)->first();
        return view('admin.Category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'nullable|integer|min:-2147483648|max:2147483647'
        ], [
            'name.required' => 'Category Name is required',
            'position.integer' => 'Position field must be a number only',
            'position.min' => 'Position field reached its minimum value',
            'position.max' => 'Position field reached its maximum value'
        ]);
        $category = category::find($id);
        $category->category_name = $request->name;
        $category->position = $request->position ? $request->position : 0;
        $category->update();

        return redirect()->route('admin.ServiceCategory.index')->with('success', 'Category Update successfully');
    }

    public function destroy($category)
    {
        $category = category::find($category);
        if ($category->sub_category()->count()) {
            return back()->with('failure', 'Cannot delete, Category has Sub-categories defined');
        }

        if ($category->services()->count()) {
            return back()->with('failure', 'Cannot delete, Sub-Category has Services defined');
        }
        $category->delete();
        return redirect()->route('admin.ServiceCategory.index')->with('success', 'You have successfully deleted a Category!');
    }

    public function changeStatus(Request $request, $id)
    {
        $status = $request->status;
        DB::table('categories')->where('id', $id)->orWhere('parents_id', $id)->update(['status' => $status]);
        return response()->json(['success' => 'Service Status changed successfully.']);
    }
}

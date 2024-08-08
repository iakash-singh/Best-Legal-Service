<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PostCategoryRequest;
use App\Models\blogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post-category-list|post-category-create|post-category-edit|post-category-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-category-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $categoryList = blogCategory::select('id', 'name', 'slug')->latest()->get();
        return view('admin.Blog.Category.show', compact('categoryList'));
    }

    public function create()
    {
        return view('admin.Blog.Category.category');
    }

    public function store(PostCategoryRequest $request)
    {
        blogCategory::create($request->all());
        return redirect(route('admin.category.index'))->with('success', 'Post Category created successfully.');
    }

    public function edit($id)
    {
        $category = blogCategory::select('id', 'name', 'slug')->where('id', $id)->first();
        return view('admin.Blog.Category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Category Name is required'
        ]);
        $category = blogCategory::find($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->save();
        return redirect(route('admin.category.index'))->with('success', 'Post Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = blogCategory::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Post Category Deleted Successfully');
    }
}

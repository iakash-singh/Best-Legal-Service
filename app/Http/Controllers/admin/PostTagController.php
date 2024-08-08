<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\blogTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostTagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post-tag-list|post-tag-create|post-tag-edit|post-tag-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-tag-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-tag-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-tag-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $tagList = blogTag::select('id', 'name', 'slug')->latest()->get();
        return view('admin.Blog.Tag.show', compact('tagList'));
    }

    public function create()
    {
        return view('admin.Blog.Tag.tag');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_tags,name',
        ], [
            'name.required' => 'Tag Name is required',
            'name.unique' => 'Tag Name already exists in our records'
        ]);
        $tag = new blogTag();
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name, '-');
        $tag->save();
        return redirect(route('admin.tag.index'))->with('success', 'Post Tag created successfully.');
    }

    public function edit($id)
    {
        $tag = blogTag::select('id', 'name', 'slug')->where('id', $id)->first();
        return view('admin.Blog.Tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Tag Name is required'
        ]);
        $tag = blogTag::find($id);
        $tag->name = $request->name;
        $tag->slug = Str::slug($request->name, '-');
        $tag->save();
        return redirect(route('admin.tag.index'))->with('success', 'Post Tag updated successfully.');
    }

    public function destroy($id)
    {
        blogTag::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Post Tag Deleted Successfully');
    }
}

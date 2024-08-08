<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{blogCategory, blogTag, Post};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:post-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $postList = Post::select('id', 'title', 'status', 'posted_by', 'created_at')->latest()->get();
        return view('admin.Blog.blogList', compact('postList'));
    }

    public function create()
    {
        $tags = blogTag::select('id', 'name')->orderBy('name', 'ASC')->get();
        $categories = blogCategory::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('admin.Blog.blogAdd', compact('tags', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'meta_key' => 'required'
        ], [
            'title.required' => 'Post Title is required',
            'body.required' => 'Post Description is required',
            'image.image' => 'Image should be an Image file Only',
            'meta_key.required' => 'Meta Keywords are required',
            'image.mimes' => 'Image should be in: jpeg,png,jpg,gif Format',
        ]);

        $imageName = '';
        if ($image = $request->file('image')) {
            $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path() . '/images/Post/', $ImageName);
            $imageName = $ImageName;
        }
        $post = new Post();
        $post->title = $request->title;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->meta_keywords = $request->meta_key;
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        return redirect(route('admin.Blog.index'))->with('success', 'Post created successfully.');
    }

    public function edit($id)
    {
        $post = Post::with('tags', 'categories')->where('id', $id)->first();
        $tags = blogTag::select('id', 'name')->orderBy('name', 'ASC')->get();
        $categories = blogCategory::select('id', 'name')->orderBy('name', 'ASC')->get();
        return view('admin.Blog.blogEdit', compact('post', 'tags', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'meta_key' => 'required',
            'image' => 'sometimes',
        ], [
            'title.required' => 'Post Title is required',
            'body.required' => 'Post Description is required',
            'meta_key.required' => 'Meta Keywords are required',
        ]);
        $imageName = '';
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            File::delete(public_path() . '/images/Post/' . $request->input('image'));
            $ImageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move(public_path() . '/images/Post/', $ImageName);
            $imageName = $ImageName;
        } else {
            $imageName = $request->input('image');
        }

        $post = Post::find($id);
        $post->title = $request->title;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->meta_keywords = $request->meta_key;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        $post->save();
        return redirect(route('admin.Blog.index'))->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete(public_path() . '/images/Post/' . $post->image);
        Post::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Post Deleted Successfully');
    }

    public function changeCheckedPost(Request $request){
        $serviceChecked = Post::find($request->post_id);
        $serviceChecked->status = $request->checked;
        $serviceChecked->save();
        return response()->json(['success' => 'Post Status Updated successfully.']);
    }
}

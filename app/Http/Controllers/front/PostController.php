<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function post(Post $slug)
    {
        return view('front.post', compact('slug'));
    }
}

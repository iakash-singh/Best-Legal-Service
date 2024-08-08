<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\{blogCategory, blogTag, Post, Service};

class SitemapController extends Controller
{
    public function index()
    {
        $services = Service::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();
        $post_categories = blogCategory::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();
        $post_tags = blogTag::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();
        $posts = Post::select('slug', 'updated_at')->orderBy('updated_at', 'desc')->get();

        return response()->view('front.sitemap.sitemap', [
            'services' => $services,
            'post_categories' => $post_categories,
            'post_tags' => $post_tags,
            'posts' => $posts
        ])->header('Content-Type', 'text/xml');
    }
}

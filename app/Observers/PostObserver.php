<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostObserver
{
    public function creating(Post $post)
    {
        $post->title = ucwords($post->title);
        $post->slug = Str::slug($post->title, '-');
        $post->posted_by = Auth::guard('web')->user()->name;
    }

    public function created(Post $post)
    {
        //
    }

    public function updating(Post $post)
    {
        $post->title = ucwords($post->title);
        $post->slug = Str::slug($post->title, '-');
        $post->posted_by = Auth::guard('web')->user()->name;
    }

    public function updated(Post $post)
    {
        //
    }

    public function deleted(Post $post)
    {
        //
    }

    public function restored(Post $post)
    {
        //
    }

    public function forceDeleted(Post $post)
    {
        //
    }
}

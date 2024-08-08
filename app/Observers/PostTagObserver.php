<?php

namespace App\Observers;

use App\Models\blogTag;
use Illuminate\Support\Str;

class PostTagObserver
{
    public function creating(blogTag $blogTag)
    {
        $blogTag->name = ucwords($blogTag->name);
        $blogTag->slug = Str::slug($blogTag->name, '-');
    }
    /**
     * Handle the blogTag "created" event.
     *
     * @param  \App\Models\blogTag  $blogTag
     * @return void
     */
    public function created(blogTag $blogTag)
    {
        //
    }

    public function updating(blogTag $blogTag)
    {
        $blogTag->name = ucwords($blogTag->name);
        $blogTag->slug = Str::slug($blogTag->name, '-');
    }
    /**
     * Handle the blogTag "updated" event.
     *
     * @param  \App\Models\blogTag  $blogTag
     * @return void
     */
    public function updated(blogTag $blogTag)
    {
        //
    }

    /**
     * Handle the blogTag "deleted" event.
     *
     * @param  \App\Models\blogTag  $blogTag
     * @return void
     */
    public function deleted(blogTag $blogTag)
    {
        //
    }

    /**
     * Handle the blogTag "restored" event.
     *
     * @param  \App\Models\blogTag  $blogTag
     * @return void
     */
    public function restored(blogTag $blogTag)
    {
        //
    }

    /**
     * Handle the blogTag "force deleted" event.
     *
     * @param  \App\Models\blogTag  $blogTag
     * @return void
     */
    public function forceDeleted(blogTag $blogTag)
    {
        //
    }
}

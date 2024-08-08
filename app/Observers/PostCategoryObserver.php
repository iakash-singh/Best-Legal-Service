<?php

namespace App\Observers;

use App\Models\blogCategory;
use Illuminate\Support\Str;

class PostCategoryObserver
{
    public function creating(blogCategory $blogCategory)
    {
        $blogCategory->name = ucwords($blogCategory->name);
        $blogCategory->slug = Str::slug($blogCategory->name, '-');
    }

    /**
     * Handle the blogCategory "created" event.
     *
     * @param  \App\Models\blogCategory  $blogCategory
     * @return void
     */
    public function created(blogCategory $blogCategory)
    {

    }

    public function updating(blogCategory $blogCategory)
    {
        $blogCategory->name = ucwords($blogCategory->name);
        $blogCategory->slug = Str::slug($blogCategory->name, '-');
    }
    /**
     * Handle the blogCategory "updated" event.
     *
     * @param  \App\Models\blogCategory  $blogCategory
     * @return void
     */
    public function updated(blogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blogCategory "deleted" event.
     *
     * @param  \App\Models\blogCategory  $blogCategory
     * @return void
     */
    public function deleted(blogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blogCategory "restored" event.
     *
     * @param  \App\Models\blogCategory  $blogCategory
     * @return void
     */
    public function restored(blogCategory $blogCategory)
    {
        //
    }

    /**
     * Handle the blogCategory "force deleted" event.
     *
     * @param  \App\Models\blogCategory  $blogCategory
     * @return void
     */
    public function forceDeleted(blogCategory $blogCategory)
    {
        //
    }
}

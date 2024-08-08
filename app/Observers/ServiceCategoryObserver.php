<?php

namespace App\Observers;

use App\Models\category;

class ServiceCategoryObserver
{
    public function creating(category $categories)
    {
        $categories->category_name = ucwords($categories->category_name);

        if (is_null($categories->position)) {
            $categories->position = category::max('position') + 1;
            return;
        }

        $lowerPriorityCategories = category::where('position', '>=', $categories->position)
            ->get();

        foreach ($lowerPriorityCategories as $lowerPriorityCategory) {
            $lowerPriorityCategory->position++;
        }
    }
    /**
     * Handle the category "created" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function created(category $category)
    {
        //
    }

    public function updating(category $categories)
    {
        $categories->category_name = ucwords($categories->category_name);
    }

    /**
     * Handle the category "updated" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function updated(category $category)
    {
        //
    }

    /**
     * Handle the category "deleted" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function deleted(category $category)
    {
        //
    }

    /**
     * Handle the category "restored" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function restored(category $category)
    {
        //
    }

    /**
     * Handle the category "force deleted" event.
     *
     * @param  \App\Models\category  $category
     * @return void
     */
    public function forceDeleted(category $category)
    {
        //
    }
}

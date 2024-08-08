<?php

namespace App\Observers;

use App\Models\Service;
use Illuminate\Support\Str;

class ServiceObserver
{
    public function creating(Service $service)
    {
        $service->ser_name = ucwords($service->ser_name);
        $service->slug = Str::slug($service->ser_name, '-');

        if (is_null($service->position)) {
            $service->position = Service::max('position') + 1;
            return;
        }

        $lowerPriorityCategories = Service::where('position', '>=', $service->position)
            ->get();

        foreach ($lowerPriorityCategories as $lowerPriorityCategory) {
            $lowerPriorityCategory->position++;
        }
    }
    /**
     * Handle the Service "created" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function created(Service $service)
    {
        //
    }

    public function updating(Service $service)
    {
        $service->ser_name = ucwords($service->ser_name);
        $service->slug = Str::slug($service->ser_name, '-');
    }
    /**
     * Handle the Service "updated" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function updated(Service $service)
    {
        //
    }

    /**
     * Handle the Service "deleted" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function deleted(Service $service)
    {
        //
    }

    /**
     * Handle the Service "restored" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function restored(Service $service)
    {
        //
    }

    /**
     * Handle the Service "force deleted" event.
     *
     * @param  \App\Models\Service  $service
     * @return void
     */
    public function forceDeleted(Service $service)
    {
        //
    }
}

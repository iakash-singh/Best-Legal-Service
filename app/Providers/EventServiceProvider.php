<?php

namespace App\Providers;

use App\Models\blogCategory;
use App\Models\blogTag;
use App\Models\category;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;
use App\Observers\PostCategoryObserver;
use App\Observers\PostObserver;
use App\Observers\PostTagObserver;
use App\Observers\ServiceCategoryObserver;
use App\Observers\ServiceObserver;
use App\Observers\UserObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        blogTag::observe(PostTagObserver::class);
        Post::observe(PostObserver::class);
        Service::observe(ServiceObserver::class);
        category::observe(ServiceCategoryObserver::class);
        blogCategory::observe(PostCategoryObserver::class);
    }
}

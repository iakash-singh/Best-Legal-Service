<?php

namespace App\Providers;

use App\Models\category;
use App\Models\social;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        view()->composer('front/layouts/*', function($view){
            $categories = category::Where('status', 1)->where('parents_id', NULL)->with('sub_category')->get();
            $socials = social::all();
            $view->with([
                'categories' => $categories,
                'socials' => $socials,
            ]);
        });
    }
}

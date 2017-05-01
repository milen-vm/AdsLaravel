<?php

namespace App\Providers;

use App\Ad;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layout.side', function ($view) {
            $archives = Ad::archives();
            $categories = Category::has('ads')->pluck('name');

            $view->with(['archives' => $archives, 'categories' => $categories]);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

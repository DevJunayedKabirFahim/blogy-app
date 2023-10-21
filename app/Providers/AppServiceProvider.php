<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;
use View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //View::share('name', 'BITM SEIP');
        View::composer(['website.master', 'admin.master'], function ($view){
            $view->with('categories', Category::where('status', 1)->get(['id', 'name']));
        });
    }
}

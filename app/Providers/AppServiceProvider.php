<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        try {
            if (Schema::hasTable('categories')) {
                $categories = Category::where('status', 1)->get();
                View::share('categories', $categories);
            }
        } catch (\Exception $e) {
            View::share('categories', collect());
        }

        try {
            if (Schema::hasTable('settings')) {
                $setting = Setting::first();
                View::share('setting', $setting);
            }
        } catch (\Exception $e) {
            View::share('setting', null);
        }
    }
}

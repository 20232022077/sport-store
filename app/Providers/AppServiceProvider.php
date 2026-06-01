<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\ShopCart;
use Illuminate\Support\Facades\Auth;
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

        View::composer('*', function ($view) {
            try {
                if (Auth::check() && Schema::hasTable('carts')) {
                    $cartCount = ShopCart::where('user_id', Auth::id())->sum('quantity');
                } else {
                    $cartCount = 0;
                }
                $view->with('cartCount', $cartCount);
            } catch (\Exception $e) {
                $view->with('cartCount', 0);
            }
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Menu;
use App\Observers\Admin\MenuObserver;
use Illuminate\Support\Facades\Blade;
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
        //
        Blade::directive("google_captcha", function ($string) {
            return "<input type='hidden' name='recaptcha_token' id='recaptcha_token' class='g-captcha' />";
        });

        // Menu::observe(MenuObserver::class);
    }
}

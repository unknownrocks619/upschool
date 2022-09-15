<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\User;
use App\Models\WebSetting;
use App\Observers\Admin\CategoryObserver;
use App\Observers\Admin\MenuObserver;
use App\Observers\Admin\UserObserver;
use App\Observers\Admin\WebsiteObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            \SocialiteProviders\Facebook\FacebookExtendSocialite::class . '@handle'
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
        WebSetting::observe(WebsiteObserver::class);
        Category::observe(CategoryObserver::class);
        User::observe(UserObserver::class);
    }

    /**
     * The model observers for your application.
     *
     * @var array
     */
    protected $observers = [
        Menu::class => [MenuObserver::class],
    ];

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}

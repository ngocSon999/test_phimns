<?php

namespace App\Providers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\ViewMovie;
use App\Listeners\CountViewMovie;

use App\Events\ViewEpisode;
use App\Listeners\ViewCountEpisode;

use function Illuminate\Events\queueable;

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
        Event::listen(ViewMovie::class,CountViewMovie::class);
//        Event::listen(queueable(function (ViewMovie $event) {
//
//        })->delay(now()->addSeconds(20)));

        Event::listen(ViewEpisode::class,ViewCountEpisode::class);
    }
}

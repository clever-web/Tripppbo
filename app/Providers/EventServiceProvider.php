<?php

namespace App\Providers;

use App\Events\ChatMessageSent;
use App\Listeners\SendChatMessage;
use App\Listeners\StripeChargeSucceeded;
use App\Listeners\UserRegisteredListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use Laravel\Cashier\Events\WebhookReceived;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
            UserRegisteredListener::class,

        ],
        ChatMessageSent::class => [
            SendChatMessage::class,
        ],
        WebhookReceived::class => [
            StripeChargeSucceeded::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

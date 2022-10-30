<?php

namespace App\Listeners;

use App\Events\ChatMessageSent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendChatMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ChatMessageSent  $event
     * @return void
     */
    public function handle(ChatMessageSent $event)
    {
        //
    }
}

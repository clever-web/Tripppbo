<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TicketLotteryWinnerSelected
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $ticket_lottery;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($ticket_lottery)
    {
        $this->ticket_lottery = $ticket_lottery;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

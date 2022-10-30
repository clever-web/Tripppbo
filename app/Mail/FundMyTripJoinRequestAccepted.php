<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FundMyTripJoinRequestAccepted extends Mailable
{
    use Queueable, SerializesModels;

    protected $join_request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($join_request)
    {
        $this->join_request = $join_request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.fund-my-trip.join-request-accepted', ['join_request' => $this->join_request]);
    }
}

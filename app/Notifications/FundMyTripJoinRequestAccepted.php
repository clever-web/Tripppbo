<?php

namespace App\Notifications;

use App\Mail\FundMyTripJoinRequestAccepted as MailFundMyTripJoinRequestAccepted;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FundMyTripJoinRequestAccepted extends Notification implements ShouldQueue
{
    use Queueable;

    protected $joinRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($joinRequest)
    {
        $this->joinRequest = $joinRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'Request Accepted!',
            'text' => 'Your request to join '.$this->joinRequest->trip->user->name.' trip has been accepted!',
            'link' => route('trip-browse', $this->joinRequest->trip->id),
            'event' => 'fundmytrip.join-request-accepted',
        ];
    }
}

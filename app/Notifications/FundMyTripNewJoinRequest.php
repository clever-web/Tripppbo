<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FundMyTripNewJoinRequest extends Notification implements ShouldQueue
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
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
            'title' => 'New Join Request!',
            'text' => $this->joinRequest->user->name.' wants to join your trip!',

            'link' => route('trip-browse', $this->joinRequest->trip->id),
            'event' => 'fundmytrip.new-join-request',
        ];
    }
}

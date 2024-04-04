<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerRequestRejectedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $reason;
    public $subject;
    public $fromEmail;
    public $mailer;

    /**
     * Create a new notification instance.
     */
    public function __construct($reason)
    {
        $this->reason = $reason;
        $this->subject = "Reservation Rejected";
        $this->fromEmail = "sud-est@example.com";
        $this->mailer = "smtp";
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->mailer($this->mailer)
        ->subject($this->subject)
        // ->attach(public_path('storage/tickets/ticket_' . $this->reservation->user_id . '_' . $this->reservation->event_id . '.pdf'))
        ->greeting("Hello " . $notifiable->name)
        ->line("Your Seller request has been rejected for this reason :")
        ->line($this->reason);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

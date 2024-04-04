<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SellerRequestAcceptedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $subject;
    public $fromEmail;
    public $mailer;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->subject = "Seller Request accepted";
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
        ->line("🤩🤩 Your seller request has been accepted by admin 🤩🤩")
        ->line("Checkout for your store.")
        ->action('Checkout Your store', 'http://127.0.0.1:8000/MyStore')
        ->line("Make money 😉.");
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

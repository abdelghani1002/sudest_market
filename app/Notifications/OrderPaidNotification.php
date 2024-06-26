<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPaidNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $subject;
    public $fromEmail;
    public $mailer;
    public $order;

    /**
     * Create a new notification instance.
     */
    public function __construct($order)
    {
        $this->order = $order;
        $this->subject = "Order paid successfully";
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
            ->greeting("Hello " . $notifiable->name)
            ->line("🤩🤩 Your order has been paid successfully 🤩🤩")
            ->line("Checkout for your order.")
            ->line("Order Details:")
            ->line("Order ID: " . $this->order->id)
            ->line("Order amount: " . $this->order->total_amount . " MAD")
            ->line("Order Status: " . $this->order->status)
            ->action('Checkout', 'http://127.0.0.1:8000/profile#orders')
            ->line("Thank you for your purchase 😉.");

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

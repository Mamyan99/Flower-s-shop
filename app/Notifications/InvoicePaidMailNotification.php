<?php

namespace App\Notifications;

use App\Models\Invoice\Invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaidMailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public Invoice $invoice,
    )
    {}

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $order = $this->invoice->order;

        return (new MailMessage)
            ->greeting('Hello!')
            ->line("$this->invoice->id has been paid!")
            ->line("Products_ids: []")
            ->line("Address: $order->country.', '.$order->region.', '.$order->city.', '.$order->street.', '.$order->apratment" )
            ->line("Phone: $order->phone");
    }
}

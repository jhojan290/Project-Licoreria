<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Gracias por tu compra en Estanquillo Fry 🍾'
        );
    }

    public function content(): Content
    {
        return new Content(
            // ↓↓↓ ESTO DEBE COINCIDIR CON EL NOMBRE DEL ARCHIVO QUE CREASTE ↓↓↓
            markdown: 'mail.order-invoice'
        );
    }
}
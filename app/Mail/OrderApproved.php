<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;
// 1. IMPORTANTE: Importar estas dos librerías para que funcione el adjunto
use Illuminate\Mail\Mailables\Attachment;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderApproved extends Mailable
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
            subject: 'Tu pedido ha sido aprobado ✌️',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.order-approved' // Mantenemos tu vista de correo original
        );
    }

    /**
     * 2. NUEVO MÉTODO: Aquí se genera y adjunta la factura automáticamente
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(function () {
                // Usamos la vista bonita 'pdf.invoice_pro' que creamos antes
                // Si le pusiste otro nombre al archivo .blade.php, cámbialo aquí
                $pdf = Pdf::loadView('pdf.facture', ['order' => $this->order]);
                return $pdf->output();
            }, 'Factura-LicUp-' . str_pad($this->order->id, 6, '0', STR_PAD_LEFT) . '.pdf')
                ->withMime('application/pdf'),
        ];
    }

}
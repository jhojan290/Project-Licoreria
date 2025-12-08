<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;
use App\Models\Order;
use App\Models\Product;
use App\Services\User\CheckoutService;
use App\Mail\OrderInvoice;
use App\Mail\OrderCancelled;
use App\Mail\OrderApproved;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de tener instalado dompdf

class OrderDetailPage extends Component
{
    public Order $order;
    public $newStatus;

    // Opciones para el select
    public $statusOptions = [
        'pending' => 'Pendiente',
        'completed' => 'Completado',
        'cancelled' => 'Cancelado'
    ];

    public function mount($id)
    {
        $this->order = Order::with(['user', 'items.product'])->findOrFail($id);
        $this->newStatus = $this->order->status;
    }

    /**
     * 1. ACTUALIZAR ESTADO Y STOCK
     */
    public function updateStatus()
    {
        $this->validate(['newStatus' => 'required|in:pending,completed,cancelled']);
        
        $service = app(CheckoutService::class);
        // Usamos la lógica del servicio para el stock y el estado
        $service->updateStatusAndHandleStock($this->order, $this->newStatus);

        $this->order->refresh(); 

        // Mensaje Feedback
        $mensaje = "Estado actualizado a " . $this->statusOptions[$this->newStatus];
        
        if ($this->newStatus === 'completed') {
            session()->flash('success', $mensaje);
            
            // Opcional: Enviar correo automático al completar
            try {
                Mail::to($this->order->user->email)->send(new OrderApproved($this->order));
            } catch (\Exception $e) {}

        } elseif ($this->newStatus === 'cancelled') {
            session()->flash('error', $mensaje);
            
            // Opcional: Enviar correo automático al cancelar
            try {
                Mail::to($this->order->user->email)->send(new OrderCancelled($this->order));
            } catch (\Exception $e) {}

        } else {
            session()->flash('status_stock', $mensaje);
        }

        $this->dispatch('order-status-updated'); 
    }

    /**
     * 2. DESCARGAR PDF (Solo descarga el archivo)
     */
    public function downloadInvoice()
    {
        // 1. Buscamos la orden (Igual que siempre)
        // Es vital el 'with' para que la vista tenga los datos de productos y usuario
        $order = Order::with(['items.product', 'user'])->find($this->order->id);

        if (!$order) {
            return; // O lanzar una alerta de error
        }

        // 2. AQUÍ ESTÁ EL CAMBIO CLAVE:
        // En lugar de usar la vista del correo (emails.order...), 
        // cargamos la vista NUEVA que acabamos de crear.
        $pdf = Pdf::loadView('pdf.facture', compact('order'));

        // Opcional: Configurar tamaño de papel
        $pdf->setPaper('a4', 'portrait');

        // 3. Descargar
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'Factura-LicUp-' . str_pad($order->id, 6, '0', STR_PAD_LEFT) . '.pdf');
    }

    /**
     * 3. REENVIAR CORREO (Solo envía el email)
     */

    public function render()
    {
        return view('livewire.admin.orders.order-detail-page')
            ->extends('layouts.admin')
            ->section('content');
    }
}
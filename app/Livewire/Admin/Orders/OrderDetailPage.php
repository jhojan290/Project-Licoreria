<?php

namespace App\Livewire\Admin\Orders;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\Order;
use App\Models\Product; 
use App\Services\Admin\AdminOrderService; // <--- Usamos el nuevo servicio
use App\Mail\OrderInvoice;
use App\Mail\OrderCancelled;
use App\Mail\OrderApproved;
use Illuminate\Support\Facades\Log;


class OrderDetailPage extends Component
{
    public Order $order;
    public $newStatus;

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

    public function updateStatus()
    {
        $this->validate(['newStatus' => 'required|in:pending,completed,cancelled']);

        $oldStatus = $this->order->status;
        $newStatus = $this->newStatus;

        if ($oldStatus === $newStatus) return;

        if (in_array($this->order->status, ['completed', 'cancelled'])) {
            return; 
        }

        $this->validate(['newStatus' => 'required|in:pending,completed,cancelled']);

        // A. DEVOLVER STOCK SI SE CANCELA
        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            foreach ($this->order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('stock', $item->quantity);
                }
            }
        }

        // B. ACTUALIZAR BASE DE DATOS
        $this->order->update(['status' => $newStatus]);

        // C. ENVIAR CORREOS (LÓGICA CORREGIDA)
        // Quitamos el try-catch silencioso para que si falla, te avise en pantalla
        try {
            if ($newStatus === 'cancelled') {
                // Enviar correo de cancelación
                Mail::to($this->order->user->email)->send(new OrderCancelled($this->order));
            
            } elseif ($newStatus === 'completed') {
                // CAMBIO AQUÍ: Usamos OrderApproved en lugar de OrderInvoice
                Mail::to($this->order->user->email)->send(new OrderApproved($this->order)); 
            }
        } catch (\Exception $e) {
            // Si falla el correo, guardamos el error en el log pero no detenemos el proceso
            Log::error('Error enviando correo de estado: ' . $e->getMessage());
            session()->flash('error', 'El estado cambió, pero falló el envío del correo: ' . $e->getMessage());
            
            // No retornamos, dejamos que siga para mostrar el mensaje de estado actualizado
        }

        // D. MENSAJE DINÁMICO
        $mensaje = 'Estado actualizado a ' . ucfirst($this->statusOptions[$newStatus]);

        if ($newStatus === 'completed') {
            session()->flash('success', $mensaje); 
        } elseif ($newStatus === 'cancelled') {
            // Si ya había mensaje de error de correo, lo concatenamos
            $errorPrevio = session('error') ? session('error') . ' | ' : '';
            session()->flash('error', $errorPrevio . $mensaje); 
        } else {
            session()->flash('status_stock', $mensaje); 
        }

        $this->dispatch('order-status-updated'); 
    }

    public function resendInvoice()
    {
        try {
            Mail::to($this->order->user->email)->send(new OrderInvoice($this->order));
            session()->flash('success', 'Factura reenviada correctamente.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al enviar correo.');
        }
    }

    public function render()
    {
        return view('livewire.admin.orders.order-detail-page')
            ->extends('layouts.admin')->section('content');
    }
}
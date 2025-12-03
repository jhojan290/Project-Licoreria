<?php

namespace App\Services\Admin;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderApproved;
use App\Mail\OrderCancelled;

class AdminOrderService
{
    public function updateStatus(Order $order, string $newStatus)
    {
        $oldStatus = $order->status;

        // Si el estado no cambia, no hacemos nada
        if ($oldStatus === $newStatus) return;

        // 1. Lógica de CANCELACIÓN (Devolver Stock)
        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('stock', $item->quantity);
                }
            }
            
            // Enviar Correo de Cancelación
            try {
                Mail::to($order->user->email)->send(new OrderCancelled($order));
            } catch (\Exception $e) {}
        }

        // 2. Lógica de COMPLETADO (Aprobado)
        if ($newStatus === 'completed' && $oldStatus !== 'completed') {
            // Enviar Correo de Aprobación
            try {
                Mail::to($order->user->email)->send(new OrderApproved($order));
            } catch (\Exception $e) {}
        }

        // 3. Actualizar BD
        $order->update(['status' => $newStatus]);
    }
}
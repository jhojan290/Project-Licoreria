<?php

namespace App\Services\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product; // <--- Asegúrate de tener esto
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;
use Illuminate\Support\Facades\DB;

class CheckoutService
{
    /**
     * Procesa la creación de una nueva orden (Checkout del Usuario)
     */
    public function processOrder($data, $cartItems, $total)
    {
        return DB::transaction(function () use ($data, $cartItems, $total) {
            
            // 1. Crear la Orden
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending', // Estado inicial
                'payment_method' => $data['payment_method'],
                'address' => $data['address'],
                'city' => $data['city'],
                'phone' => $data['phone'],
                'identification' => $data['identification'],
            ]);

            // 2. Crear Items y RESTAR STOCK
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'product_name' => $item['name'],
                ]);

                // Descontar stock
                $product = Product::find($item['id']);
                if ($product) {
                    if ($product->stock >= $item['quantity']) {
                        $product->decrement('stock', $item['quantity']);
                    }
                }
            }

            // 3. Enviar Factura Inicial
            try {
                Mail::to(Auth::user()->email)->send(new OrderInvoice($order));
            } catch (\Exception $e) {}

            return $order;
        });
    }

    /**
     * Eliminar múltiples items del carrito (Lógica de sesión)
     */
    public function removeMultiple(array $ids)
    {
        $cart = session()->get('cart', []);
        
        foreach ($ids as $id) {
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
        }
        
        session()->put('cart', $cart);
    }

    /**
     * ↓↓↓ ESTA ES LA FUNCIÓN QUE FALTABA ↓↓↓
     * Actualiza el estado y maneja la devolución de stock si se cancela.
     */
    public function updateStatusAndHandleStock(Order $order, string $newStatus)
    {
        // 1. Si el estado nuevo es 'cancelled' y el viejo no lo era, devolvemos el stock
        if ($newStatus === 'cancelled' && $order->status !== 'cancelled') {
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    $product->increment('stock', $item->quantity); // Devolver stock
                }
            }
        }

        // 2. Actualizar el estado en la base de datos
        $order->update(['status' => $newStatus]);
    }
}
<?php

namespace App\Services\User;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product; // <--- Importante
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;
use Illuminate\Support\Facades\DB; // Para transacciones seguras

class CheckoutService
{
    public function processOrder($data, $cartItems, $total)
    {
        return DB::transaction(function () use ($data, $cartItems, $total) {
            
            // 1. Crear la Orden (Estado PENDIENTE)
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending', // <--- CAMBIO: Nace pendiente
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

                // ↓↓↓ DESCONTAR STOCK ↓↓↓
                $product = Product::find($item['id']);
                if ($product) {
                    // Evitar stock negativo
                    if ($product->stock >= $item['quantity']) {
                        $product->decrement('stock', $item['quantity']);
                    } else {
                        throw new \Exception("No hay suficiente stock para el producto: " . $product->name);
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
}
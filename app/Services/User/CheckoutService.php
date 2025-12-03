<?php

namespace App\Services\User; // <--- ¡ESTO DEBE COINCIDIR CON LA CARPETA!

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderInvoice;

class CheckoutService
{
    public function processOrder($data, $cartItems, $total)
    {
        // 1. Crear la Orden
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'payment_method' => $data['payment_method'],
            'address' => $data['address'],
            'city' => $data['city'],
            'phone' => $data['phone'],
            'identification' => $data['identification'],
            'status' => 'completed' // Aseguramos un estado por defecto
        ]);

        // 2. Crear los Items
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'product_name' => $item['name'],
            ]);
        }

        // 3. Enviar Correo (Dentro de try-catch para que no falle si el mail está mal configurado)
        Mail::to(Auth::user()->email)->send(new OrderInvoice($order));

        return $order;
    }
}
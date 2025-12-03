<?php

namespace App\Services\User;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    // Agregar producto
    public function add($productId)
    {
        $cart = Session::get('cart', []);
        $product = Product::find($productId);

        if (!$product) return;

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'volume' => $product->volume, // Para mostrar detalle
                'image_path' => $product->image_path,
                'quantity' => 1
            ];
        }

        Session::put('cart', $cart);
    }

    // Eliminar producto
    public function remove($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }
    }

    // Incrementar cantidad
    public function increment($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            Session::put('cart', $cart);
        }
    }

    // Decrementar cantidad
    public function decrement($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]); // Si baja de 1, se borra
            }
            Session::put('cart', $cart);
        }
    }

    // Obtener contenido
    public function getContent()
    {
        return Session::get('cart', []);
    }

    // Calcular Total
    public function getTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    // Limpiar carrito
    public function clear()
    {
        Session::forget('cart');
    }

    public function removeMultiple(array $ids)
    {
        $cart = Session::get('cart', []);
        
        foreach ($ids as $id) {
            if (isset($cart[$id])) {
                unset($cart[$id]);
            }
        }
        
        Session::put('cart', $cart);
    }
}
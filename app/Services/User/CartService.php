<?php

namespace App\Services\User;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function add($productId)
    {
        $cart = Session::get('cart', []);
        $product = Product::find($productId);

        if (!$product) return;

        // Verificar si ya existe y si hay stock para sumar
        $currentQty = isset($cart[$productId]) ? $cart[$productId]['quantity'] : 0;

        if ($currentQty < $product->stock) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity']++;
            } else {
                $cart[$productId] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'volume' => $product->volume,
                    'image_path' => $product->image_path,
                    'quantity' => 1,
                ];
            }
            Session::put('cart', $cart);
        }
    }

    public function increment($productId)
    {
        $cart = Session::get('cart', []);
        $product = Product::find($productId); // Consultamos stock real

        if (isset($cart[$productId]) && $product) {
            // Solo sumamos si la cantidad actual es MENOR al stock real
            if ($cart[$productId]['quantity'] < $product->stock) {
                $cart[$productId]['quantity']++;
                Session::put('cart', $cart);
            }
        }
    }

    // ... (decrement, remove, removeMultiple siguen igual) ...
    public function decrement($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]);
            }
            Session::put('cart', $cart);
        }
    }

    public function remove($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            Session::put('cart', $cart);
        }
    }

    public function removeMultiple(array $ids)
    {
        $cart = Session::get('cart', []);
        foreach ($ids as $id) {
            if (isset($cart[$id])) unset($cart[$id]);
        }
        Session::put('cart', $cart);
    }

    // MODIFICAMOS ESTO para inyectar el stock real a la vista
    public function getContent()
    {
        $cart = Session::get('cart', []);
        
        // Recorremos el carrito y buscamos el stock actualizado de la BD
        // Esto sirve para que el botón se deshabilite si alguien compró el último mientras navegabas
        foreach ($cart as $id => &$item) {
            $product = Product::find($id);
            $item['stock_limit'] = $product ? $product->stock : 0;
        }
        
        return $cart;
    }

    public function getTotal()
    {
        $cart = Session::get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }
    
    public function clear()
    {
        Session::forget('cart');
    }
}
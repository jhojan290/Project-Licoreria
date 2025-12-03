<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;
use App\Models\Product;

class ProductDetailsPage extends Component
{
    public $product;

    // El método mount captura el {id} de la ruta automáticamente
    public function mount($id)
    {
        // Si el producto no existe, muestra página 404
        $this->product = Product::findOrFail($id);
    }

    public function addToCart($id = null) // Ojo con el argumento
    {
        // Si estás en ProductDetail, usa $this->product->id
        $productId = $id ?? $this->product->id; 

        // 1. DISPARA EL EVENTO PARA QUE EL CARRITO LO AGREGUE
        $this->dispatch('add-to-cart', productId: $productId);

        // 2. ABRE EL SIDEBAR
        $this->dispatch('openSidebar', title: 'Tu Carrito', partial: 'cart');
    }

    public function render()
    {
        // Usamos el layout de usuario
        return view('livewire.user.pages.product-details-page')
            ->extends('layouts.user')
            ->section('content');
    }
}
<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;
use App\Models\Product;
use App\Services\User\CartService; // Importar para el carrito
use Livewire\Attributes\Title;

#[Title('Inicio - LicUp')]
class HomePage extends Component
{
    // PROPIEDAD COMPUTADA: Productos Recomendados
    // Traemos 6 productos aleatorios o los últimos creados
    public function getRecommendedProductsProperty()
    {
        return Product::where('stock', '>', 0)
            ->inRandomOrder() // O ->latest()
            ->take(15)
            ->get();
    }

    // Acción para agregar al carrito desde el Home
    public function addToCart($productId)
    {
        $cartService = app(CartService::class);
        $cartService->add($productId);

        $this->dispatch('cart-updated'); 
        $this->dispatch('openSidebar', title: 'Tu Carrito', partial: 'cart');
    }

    public function render()
    {
        return view('livewire.user.pages.home-page')
            ->extends('layouts.user')
            ->section('content');
    }
}
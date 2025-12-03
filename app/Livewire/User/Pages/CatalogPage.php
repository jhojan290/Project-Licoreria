<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\User\CatalogService;
use Livewire\Attributes\Url;
use Livewire\Attributes\Computed;
use App\Services\User\CartService;

class CatalogPage extends Component
{
    use WithPagination;

    // Filtros en la URL
    #[Url(except: '')] public $search = '';
    #[Url(except: '')] public $category = '';
    #[Url(except: '')] public $brand = '';
    #[Url(except: '')] public $priceRange = '';
    #[Url(except: 'newest')] public $sort = 'newest';

    // Resetear paginación al filtrar
    public function updatedSearch() { $this->resetPage(); }
    public function updatedCategory() { $this->resetPage(); }
    public function updatedBrand() { $this->resetPage(); }
    public function updatedPriceRange() { $this->resetPage(); }

    public function clearFilters()
    {
        $this->reset(['search', 'category', 'brand', 'priceRange', 'sort']);
        $this->resetPage();
    }

    #[Computed]
    public function products()
    {
        $service = app(CatalogService::class);
        return $service->getProducts([
            'search' => $this->search,
            'category' => $this->category,
            'brand' => $this->brand,
            'priceRange' => $this->priceRange,
        ], $this->sort);
    }

    #[Computed]
    public function filterOptions()
    {
        $service = app(CatalogService::class);
        return [
            'categories' => $service->getCategories(),
            'brands'     => $service->getBrands(),
        ];
    }

    public function addToCart($productId)
    {
        // 1. Guardar
        $cartService = app(CartService::class);
        $cartService->add($productId);

        // 2. Avisar al Carrito que se actualice
        $this->dispatch('cart-updated'); 

        // 3. ABRIR EL SIDEBAR (Esto es lo que faltaba)
        $this->dispatch('openSidebar', title: 'Tu Carrito', partial: 'cart');
    }

    public function render()
    {
        return view('livewire.user.pages.catalog-page')
            ->extends('layouts.user')
            ->section('content');
    }
}
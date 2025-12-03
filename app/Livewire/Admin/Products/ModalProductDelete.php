<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Product;
use App\Services\Admin\ProductService;

class ModalProductDelete extends Component
{
    public $open = false;
    public $itemIds = []; // CAMBIO: Ahora es un array

    #[On('open-delete-modal')]
    public function openModal($ids) // Recibe uno o varios
    {
        // Si recibimos un solo ID (número), lo convertimos en array
        $this->itemIds = is_array($ids) ? $ids : [$ids];
        $this->open = true;
    }

    public function confirmDelete(ProductService $service)
    {
        if (!empty($this->itemIds)) {
            // Llamamos a la nueva función del servicio
            $service->deleteMultiple($this->itemIds);
            
            $this->dispatch('refresh-inventory');
            $this->open = false;
            
            // Disparamos un evento extra para limpiar la selección en la lista
            $this->dispatch('clear-selection'); 
        }
    }

    public function render()
    {
        return view('livewire.admin.products.modal-product-delete');
    }
}
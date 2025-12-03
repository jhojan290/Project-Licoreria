<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\On;

class ModalProductCreate extends Component
{
    public $open = false;
    public $view = null;
    public $productId = null; // Guardamos el ID si es edición

    #[On('open-modal')]
    public function openModal($view, $productId = null)
    {
        $this->view = $view;
        $this->productId = $productId; // Si es null, será crear. Si tiene ID, será editar.
        $this->open = true;
    }

    #[On('close-modal')]
    public function closeModal()
    {
        $this->reset(['open', 'view', 'productId']);
    }

    public function render()
    {
        return view('livewire.admin.products.modal-product-create');
    }
}
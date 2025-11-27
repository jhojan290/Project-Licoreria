<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\Attributes\On; // <--- Importante: Importar el atributo

class ModalProductCreate extends Component
{
    public $open = false;      
    public $view = null;

    // Eliminamos $listeners = ['openModal']; y usamos el atributo:

    #[On('open-modal')] // <--- Escucha el evento 'open-modal' globalmente
    public function openModal($view)
    {
        $this->view = $view;
        $this->open = true;
    }

    public function closeModal()
    {
        $this->reset(['open', 'view']); // Buena práctica: limpiar el estado al cerrar
    }

    public function render()
    {
        return view('livewire.admin.products.modal-product-create');
    }
}
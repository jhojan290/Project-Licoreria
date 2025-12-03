<?php

namespace App\Livewire\User\Elements;

use Livewire\Component;
use Livewire\Attributes\On;

class Sidebar extends Component
{
    public $open = false;
    public $title = '';
    public $partial = 'login'; // Valor por defecto para evitar nulos
    public $statusMessage = '';
    public $icon = 'menu';

    // 1. ABRIR SIDEBAR (Desde botones externos)
    #[On('openSidebar')]
    public function open($title, $partial, $message = '')
    {
        $this->title = $title;
        $this->partial = $partial;
        $this->statusMessage = $message;
        $this->open = true;
        
        $this->updateIcon(); // Calculamos el icono al abrir
    }

    // 2. CAMBIAR VISTA INTERNA (Ej: De Registro a Login)
    #[On('change-sidebar-view')]
    public function changeView($view, $title)
    {
        $this->partial = $view;
        $this->title = $title;
        
        $this->updateIcon(); // Recalculamos el icono al cambiar
    }

    // 3. LÓGICA DE ICONOS (La función que te faltaba)
    public function updateIcon()
    {
        $this->icon = match($this->partial) {
            'cart'       => 'shopping_cart',      // Icono Carrito
            'login'      => 'login',              // Icono Puerta/Login
            'createUser' => 'person_add',         // Icono Crear Usuario
            'profile'    => 'account_circle',     // Icono Perfil
            default      => 'menu',               // Icono Default
        };
    }

    public function close()
    {
        $this->open = false;
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar');
    }
}
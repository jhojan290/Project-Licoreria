<?php

namespace App\Livewire\User\Elements\Sidebar;

use Livewire\Component;
use App\Services\User\CartService;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class Cart extends Component
{
    // --- NUEVA PROPIEDAD ---
    // Guardamos aquí los IDs de los productos marcados (checkbox)
    public $selected = []; 

    // ----------------------------------------------------
    // 1. AGREGAR AL CARRITO
    // ----------------------------------------------------
    #[On('add-to-cart')] 
    public function addToCart($productId)
    {
        $service = app(CartService::class);
        $service->add($productId);
        
        // UX: Si agrego algo, lo selecciono automáticamente para sumarlo al total
        // Usamos (string) para evitar problemas de comparación
        if (!in_array((string)$productId, $this->selected)) {
            $this->selected[] = (string)$productId; 
        }

        // Refrescar vista
        $this->refreshCart();
    }

    // ----------------------------------------------------
    // 2. EVENTO DE ACTUALIZACIÓN
    // ----------------------------------------------------
    #[On('cart-updated')] 
    public function refreshCart()
    {
        unset($this->cartItems);
        unset($this->total);
        unset($this->isAllSelected);
    }

    // ----------------------------------------------------
    // 3. ACCIONES INDIVIDUALES (Incrementar/Restar/Borrar)
    // ----------------------------------------------------
    public function increment($id)
    {
        app(CartService::class)->increment($id);
        $this->refreshCart();
    }

    public function decrement($id)
    {
        app(CartService::class)->decrement($id);
        $this->refreshCart();
    }

    public function remove($id)
    {
        app(CartService::class)->remove($id);
        
        // Al borrar uno, también lo sacamos de la selección
        $this->selected = array_diff($this->selected, [(string)$id]);
        
        $this->refreshCart();
    }

    // ----------------------------------------------------
    // 4. ACCIONES MASIVAS (Lo nuevo)
    // ----------------------------------------------------
    
    // Borrar solo los marcados
    public function deleteSelected()
    {
        if (!empty($this->selected)) {
            // Usamos la función nueva del servicio
            app(CartService::class)->removeMultiple($this->selected);
            
            // Limpiamos la selección porque esos productos ya no existen
            $this->selected = []; 
            
            $this->refreshCart();
        }
    }

    // Checkbox maestro (Seleccionar/Deseleccionar todo)
    public function toggleSelectAll()
    {
        // Obtenemos los productos actuales
        $items = app(CartService::class)->getContent();
        $allIds = array_map('strval', array_keys($items));

        // Si ya están todos marcados -> Desmarcar todo
        if (count($this->selected) === count($allIds)) {
            $this->selected = [];
        } else {
            // Si falta alguno -> Marcar todo
            $this->selected = $allIds;
        }
    }

    // ----------------------------------------------------
    // 5. PROPIEDADES COMPUTADAS (Datos y Cálculos)
    // ----------------------------------------------------

    #[Computed]
    public function cartItems()
    {
        return app(CartService::class)->getContent();
    }

    // Total condicional: Solo suma lo que está en $selected
    #[Computed]
    public function total()
    {
        $items = $this->cartItems; // Llama a la computada de arriba
        $total = 0;

        foreach ($items as $id => $item) {
            // Si el ID está en el array de seleccionados, sumamos
            if (in_array((string)$id, $this->selected)) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }
    
    // Helper para saber si el checkbox maestro debe estar marcado
    #[Computed]
    public function isAllSelected()
    {
        $items = $this->cartItems;
        if (empty($items)) return false;
        return count($this->selected) === count($items);
    }

    public function proceedToCheckout()
    {
        if (count($this->selected) == 0) {
            // Detenemos la ejecución si no hay nada seleccionado, aunque el botón esté deshabilitado.
            return; 
        }

        if (!auth()->check()) {
            $this->dispatch('openSidebar', 
                title: 'Iniciar Sesión', 
                partial: 'login', 
                message: '🔒 Para finalizar tu compra, necesitas iniciar sesión.',
                type: 'warning' // <--- TIPO AMARILLO/ROJO
            );
            return;
        }

        // 1. Guardamos la selección en la sesión
        session()->put('checkout_selected_ids', $this->selected);
        
        // 2. CAMBIO CRÍTICO: Usamos el helper de Livewire para la redirección
        // Esto es más directo y Livewire lo interpreta mejor que el objeto Response.
        $this->redirect(route('checkout'), navigate: true); 
    }

    public function render()
    {
        return view('livewire.user.elements.sidebar.cart');
    }
}
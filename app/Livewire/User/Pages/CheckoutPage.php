<?php

namespace App\Livewire\User\Pages;

use Livewire\Component;
use App\Services\User\CartService;
use App\Services\User\CheckoutService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;

class CheckoutPage extends Component
{
    // Datos de envío
    public $address, $city, $phone, $identification;
    
    // Datos de Pago
    public $selectedPaymentMethod = ''; 
    
    // Lógica de selección de productos
    public $selected = []; 
    public $success = false;

    // VARIABLES PARA EL MODAL DE PAGO (SIMULACIÓN)
    public $showBankModal = false;
    public $bankField = ''; 

    public function mount(CartService $cartService)
    {
        $preSelected = session()->get('checkout_selected_ids', []);
        $cartContent = $cartService->getContent();

        if (!is_array($preSelected)) {
            $preSelected = [];
        }

        if (empty($cartContent)) {
            return redirect()->route('catalog');
        }

        // Sincronizar selección
        if (!empty($preSelected)) {
            // array_values asegura que los indices sean 0, 1, 2...
            $this->selected = array_values(array_intersect($preSelected, array_keys($cartContent)));
        } else {
            $this->selected = array_values(array_map('strval', array_keys($cartContent)));
        }
    }

    #[Computed]
    public function checkoutTotal()
    {
        $cartService = app(CartService::class);
        $items = $cartService->getContent();
        $total = 0;

        foreach ($items as $id => $item) {
            if (in_array((string)$id, $this->selected)) {
                $total += $item['price'] * $item['quantity'];
            }
        }
        return $total;
    }

    // ====================================================
    // PASO 1: VALIDAR Y ABRIR MODAL (Reemplaza completeOrder)
    // ====================================================
    public function initiatePayment()
    {
        // Validaciones del Formulario de Envío
        $this->validate([
            'address' => 'required|min:5',
            'city' => 'required',
            'phone' => 'required|numeric',
            'identification' => 'required',
            'selectedPaymentMethod' => 'required', 
        ], [
            'selectedPaymentMethod.required' => 'Por favor selecciona un método de pago.'
        ]);

        if (empty($this->selected)) {
            $this->addError('payment', 'Debes seleccionar al menos un producto para pagar.');
            return;
        }

        // Si todo está bien, abrimos la "Pasarela Falsa"
        $this->showBankModal = true;
        $this->bankField = ''; // Limpiamos el campo simulado
    }

    // ====================================================
    // PASO 2: PROCESAR TRANSACCIÓN REAL (Al confirmar en Modal)
    // ====================================================
    public function confirmOrder(CartService $cartService, CheckoutService $checkoutService)
    {
        // 1. Validaciones
        $this->validate([
            'address' => 'required|min:5',
            'city' => 'required',
            'phone' => 'required|numeric',
            'identification' => 'required',
            'selectedPaymentMethod' => 'required', 
        ], [
            'selectedPaymentMethod.required' => 'Por favor selecciona un banco para continuar.'
        ]);

        if (empty($this->selected)) {
            $this->addError('payment', 'Debes seleccionar productos.');
            return;
        }

        // 2. Filtrar items seleccionados
        $items = $cartService->getContent();
        $itemsToPay = array_filter($items, fn($key) => in_array((string)$key, $this->selected), ARRAY_FILTER_USE_KEY);

        // 3. Procesar Orden
        $order = $checkoutService->processOrder([
            'payment_method' => $this->selectedPaymentMethod,
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'identification' => $this->identification,
        ], $itemsToPay, $this->checkoutTotal);

        // 4. Limpiar carrito
        $cartService->removeMultiple($this->selected);
        
        // 5. CONSTRUIR MENSAJE DE WHATSAPP (Con lista de productos)
        $numeroVendedor = '573127430067'; // TU NÚMERO REAL
        $nombreCliente = Auth::user()->name;
        
        $msg  = "Hola *Estanquillo Fry* 🥃, quiero finalizar mi pedido.\n\n";
        $msg .= "🧾 *Orden:* #{$order->id}\n";
        $msg .= "👤 *Cliente:* {$nombreCliente}\n";
        
        // ↓↓↓ AQUÍ AGREGAMOS LOS PRODUCTOS ↓↓↓
        $msg .= "📦 *Productos:*\n";
        foreach ($itemsToPay as $item) {
            $subtotalItem = number_format($item['price'] * $item['quantity'], 0, ',', '.');
            $msg .= "▪ {$item['quantity']}x {$item['name']} (\${$subtotalItem})\n";
        }
        $msg .= "\n"; // Espacio
        // ↑↑↑ FIN DE LA LISTA DE PRODUCTOS ↑↑↑

        $msg .= "📍 *Entrega:* {$this->address}, {$this->city}\n";
        $msg .= "💰 *Total a Pagar:* $" . number_format($this->checkoutTotal, 0, ',', '.') . "\n";
        $msg .= "💳 *Método:* " . ucfirst($this->selectedPaymentMethod) . "\n\n";
        $msg .= "Quedo atento a los datos de la cuenta para transferir.";

        $url = "https://wa.me/{$numeroVendedor}?text=" . urlencode($msg);

        $this->success = true; // Para mostrar la pantalla de "Pedido en Proceso"
        
        // Enviamos la URL al navegador para que la abra él
        $this->dispatch('open-whatsapp', url: $url);
    }

    // ====================================================
    // FUNCIONES AUXILIARES (INTACTAS)
    // ====================================================


    #[On('cart-updated')] 
    public function refreshCart()
    {
        unset($this->cartItems);
        unset($this->total);
        unset($this->isAllSelected);
    }


    public function remove($id)
    {
        // 1. Eliminar del servicio (Backend)
        app(CartService::class)->remove($id);
        
        // 2. CORRECCIÓN DEL ERROR: 
        // Aseguramos que $this->selected sea un array. 
        // Si por error llegó como "true", lo convertimos a array vacío para no romper el código.
        if (!is_array($this->selected)) {
            $this->selected = [];
        }

        // 3. Quitamos el ID eliminado de la lista de seleccionados
        $this->selected = array_diff($this->selected, [(string)$id]);
        
        // 4. IMPORTANTE: Reindexar el array
        // Livewire prefiere arrays indexados [0, 1, 2] en lugar de huecos [0, 2, 5]
        $this->selected = array_values($this->selected);
        
        // 5. Refrescar la vista
        $this->refreshCart();
    }

    public function removeSelection()
    {
        if (!empty($this->selected)) {
            $cartService = app(CartService::class);
            $cartService->removeMultiple($this->selected);
            
            $this->selected = [];
            
            $this->dispatch('cart-updated');
        }
    }

    public function toggleSelectAll()
    {
        $cartService = app(CartService::class);
        $allItems = array_keys($cartService->getContent());
        
        if (count($this->selected) === count($allItems)) {
            $this->selected = [];
        } else {
            $this->selected = array_map('strval', $allItems);
        }
    }

    #[Computed]
    public function isAllSelected()
    {
        $cartService = app(CartService::class);
        $items = $cartService->getContent();
        
        if (empty($items)) return false;
        
        return count($this->selected) === count($items);
    }

    public function render()
    {
        $cartService = app(CartService::class);
        return view('livewire.user.pages.checkout-page', [
            'cartItems' => $cartService->getContent()
        ])
        ->extends('layouts.checkout') 
        ->section('content');
    }
}
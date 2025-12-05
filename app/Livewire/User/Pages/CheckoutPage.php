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
        // 1. Recuperamos lo que seleccionó en el sidebar
        $preSelected = session()->get('checkout_selected_ids', []);
        $cartContent = $cartService->getContent();

        if (!is_array($preSelected)) {
            $preSelected = [];
        }

        if (empty($cartContent)) {
            return redirect()->route('catalogo');
        }

        // 2. Sincronizar selección
        if (!empty($preSelected)) {
            $this->selected = array_intersect($preSelected, array_keys($cartContent));
        } else {
            $this->selected = array_map('strval', array_keys($cartContent));
        }
        
        // Opcional: Pre-llenar datos del usuario
        // $user = Auth::user();
        // $this->email = $user->email; 
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
    public function finalizeTransaction(CartService $cartService, CheckoutService $checkoutService)
    {
        // Validación del campo falso del banco (para realismo)
        $this->validate([
            'bankField' => 'required'
        ], ['bankField.required' => 'Este campo es obligatorio por tu banco.']);

        // 1. Filtrar items seleccionados
        $allItems = $cartService->getContent();
        $itemsToPay = array_filter($allItems, function($key) {
            return in_array((string)$key, $this->selected);
        }, ARRAY_FILTER_USE_KEY);

        // 2. Procesar la orden (DB, Stock, Correo)
        $checkoutService->processOrder([
            'payment_method' => $this->selectedPaymentMethod,
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'identification' => $this->identification,
        ], $itemsToPay, $this->checkoutTotal);

        // 3. Limpiar carrito y mostrar éxito
        $cartService->removeMultiple($this->selected);
        $this->showBankModal = false;
        $this->success = true;
    }

    // ====================================================
    // FUNCIONES AUXILIARES (INTACTAS)
    // ====================================================

    public function removeSelection()
    {
        if (!empty($this->selected)) {
            $cartService = app(CartService::class);
            $cartService->removeMultiple($this->selected);
            
            $this->selected = [];

            if (empty($cartService->getContent())) {
                return redirect()->route('catalogo');
            }
            
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
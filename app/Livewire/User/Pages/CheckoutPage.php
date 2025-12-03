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
    
    // 1. NUEVA VARIABLE: Para guardar qué banco seleccionó el usuario
    public $selectedPaymentMethod = ''; 

    // Lógica de selección de productos
    public $selected = []; 
    public $success = false;

    public function mount(CartService $cartService)
    {
        // 1. Recuperamos lo que seleccionó en el sidebar
        $preSelected = session()->get('checkout_selected_ids', []);
        $cartContent = $cartService->getContent();

        if (empty($cartContent)) {
            return redirect()->route('catalog');
        }

        // 2. Sincronizar selección
        if (!empty($preSelected)) {
            $this->selected = array_intersect($preSelected, array_keys($cartContent));
        } else {
            $this->selected = array_map('strval', array_keys($cartContent));
        }
        
        // Pre-llenar email (solo visual, no se guarda en variable pública porque usamos Auth::user())
        // $this->email = Auth::user()->email; 
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

    // 2. RENOMBRAMOS LA FUNCIÓN: Ya no recibe $method por parámetro, usa la variable pública
    public function completeOrder(CartService $cartService, CheckoutService $checkoutService)
    {
        // Validaciones
        $this->validate([
            'address' => 'required|min:5',
            'city' => 'required',
            'phone' => 'required|numeric',
            'identification' => 'required',
            // 3. NUEVA VALIDACIÓN: Obligatorio seleccionar banco
            'selectedPaymentMethod' => 'required', 
        ], [
            'selectedPaymentMethod.required' => 'Por favor selecciona un método de pago.'
        ]);

        // Validar que haya productos seleccionados
        if (empty($this->selected)) {
            $this->addError('payment', 'Debes seleccionar al menos un producto para pagar.');
            return;
        }

        // Filtramos los items a pagar
        $allItems = $cartService->getContent();
        $itemsToPay = array_filter($allItems, function($key) {
            return in_array((string)$key, $this->selected);
        }, ARRAY_FILTER_USE_KEY);

        // Procesar la orden
        $checkoutService->processOrder([
            'payment_method' => $this->selectedPaymentMethod, // <--- USAMOS LA SELECCIÓN DEL USUARIO
            'address' => $this->address,
            'city' => $this->city,
            'phone' => $this->phone,
            'identification' => $this->identification,
        ], $itemsToPay, $this->checkoutTotal);

        // Limpiar carrito (solo lo pagado) y mostrar éxito
        $cartService->removeMultiple($this->selected);
        $this->success = true;
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
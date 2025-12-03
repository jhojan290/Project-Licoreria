<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;

class OrdersPage extends Component
{
    use WithPagination;

    public $search = '';

    public function updatedSearch() { $this->resetPage(); }

    public function render()
    {
        // Traemos todas las órdenes, cargando el usuario que las hizo
        $orders = Order::with('user')
            ->when($this->search, fn($q) => $q->where('id', 'like', '%'.$this->search.'%')
            ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%'.$this->search.'%')))
            ->orderBy('created_at', 'desc')
            ->paginate(15); // 15 órdenes por página

        return view('livewire.admin.orders.orders-page', [
            'orders' => $orders
        ])->extends('layouts.admin')->section('content');
    }
}
<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed; // <--- Importante

class OrdersPage extends Component
{
    use WithPagination;

    public $search = '';
    public $selectedOrders = []; // Mantenemos este nombre para no romper tu vista
    // Eliminamos public $selectAll; ya no se usa como propiedad simple

    // 1. COMPUTED: Traemos la consulta aquí para reutilizarla en la lógica de selección
    #[Computed]
    public function orders()
    {
        return Order::with('user')
            ->when($this->search, function ($query) {
                $query->where('id', 'like', '%' . $this->search . '%')
                ->orWhereHas('user', fn($q) => $q->where('name', 'like', '%' . $this->search . '%'));
            })
            ->orderBy('created_at', 'desc')
            ->paginate(15);
    }

    // 2. LÓGICA DE SELECCIÓN (Estilo ProductList + Filtro de Status)
    public function toggleSelectAll()
    {
        // A. Obtenemos las órdenes de la página actual (usando la computed property)
        $paginator = $this->orders();

        // B. Filtramos SOLO los IDs que son borrables (completed/cancelled)
        // Ignoramos las 'pending' para que no se seleccionen masivamente
        $validPageIds = collect($paginator->items())
            ->filter(fn($order) => in_array($order->status, ['completed', 'cancelled']))
            ->pluck('id')
            ->map(fn($id) => (string) $id)
            ->toArray();

        // Si no hay nada seleccionable en esta página, no hacemos nada
        if (empty($validPageIds)) {
            return;
        }

        // C. Calculamos intersección (cuántos de los válidos ya están seleccionados)
        $intersect = array_intersect($this->selectedOrders, $validPageIds);

        // D. Lógica de Toggle
        if (count($intersect) === count($validPageIds)) {
            // Si TODOS los válidos de esta página están marcados -> DESMARCARLOS
            $this->selectedOrders = array_values(array_diff($this->selectedOrders, $validPageIds));
        } else {
            // Si falta alguno por marcar -> MARCARLOS TODOS (los válidos)
            $this->selectedOrders = array_values(array_unique(array_merge($this->selectedOrders, $validPageIds)));
        }
    }

    // 3. COMPUTED PARA EL ESTADO DEL CHECKBOX MAESTRO
    #[Computed]
    public function isAllSelected()
    {
        $paginator = $this->orders();

        // Obtenemos solo IDs válidos de la página actual
        $validPageIds = collect($paginator->items())
            ->filter(fn($order) => in_array($order->status, ['completed', 'cancelled']))
            ->pluck('id')
            ->map(fn($id) => (string) $id)
            ->toArray();

        if (empty($validPageIds)) {
            return false;
        }

        // Verificamos si todos los válidos están en el array de selección
        $intersect = array_intersect($this->selectedOrders, $validPageIds);

        return count($intersect) === count($validPageIds);
    }

    // --- MÉTODOS DE ELIMINACIÓN (Se mantienen igual de seguros) ---

    public function deleteOrder($orderId)
    {
        $order = Order::find($orderId);

        // Seguridad: Solo borrar si existe y el estado lo permite
        if ($order && in_array($order->status, ['completed', 'cancelled'])) {
            $order->delete();
            
            // Limpieza del array de seleccionados si borramos uno que estaba marcado
            $this->selectedOrders = array_values(array_diff($this->selectedOrders, [(string)$orderId]));
            
            $this->dispatch('swal:success', ['title' => 'Orden eliminada correctamente']);
        } else {
            $this->dispatch('swal:error', ['title' => 'No puedes eliminar una orden pendiente']);
        }
    }

    public function deleteSelected()
    {
        if (empty($this->selectedOrders)) return;

        // Doble filtro de seguridad al borrar masivamente
        $ordersToDelete = Order::whereIn('id', $this->selectedOrders)
            ->whereIn('status', ['completed', 'cancelled'])
            ->get();

        foreach ($ordersToDelete as $order) {
            $order->delete();
        }

        $this->selectedOrders = [];
        $this->dispatch('swal:success', ['title' => 'Órdenes seleccionadas eliminadas']);
    }

    // --- RESTO DE MÉTODOS ---

    public function updatedSearch() { $this->resetPage(); }

    #[On('order-status-updated')] 
    public function refreshList() { 
        unset($this->orders); // Limpiamos caché de la computed property
        $this->render(); 
    }

    public function render()
    {
        // Ya no hacemos la consulta aquí, usamos $this->orders
        return view('livewire.admin.orders.orders-page', [
            'orders' => $this->orders // Llamamos a la computed property
        ])->extends('layouts.admin')->section('content');
    }
}
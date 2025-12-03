<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed; // <--- Importante
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductList extends Component
{
    use WithPagination;

    public $search = '';
    public $categoryFilter = '';
    public $selected = [];

    // Actualiza la tabla cuando se guarda algo en el modal
    protected $listeners = [
        'refresh-list' => '$refresh',
    ];

    // Resetea paginación al buscar
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedCategoryFilter()
    {
        $this->resetPage();
    }

    // ↓↓↓↓↓ AQUÍ ESTÁ LA SOLUCIÓN: PROPIEDAD COMPUTADA ↓↓↓↓↓
    // Movemos la consulta aquí para poder usarla en toda la clase como $this->products
    #[Computed]
    public function products()
    {
        return Product::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('brand', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category', $this->categoryFilter);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }
    // ↑↑↑↑↑ FIN DE LA PROPIEDAD COMPUTADA ↑↑↑↑↑


    #[On('delete-confirmed')] 
    public function deleteConfirmed($id)
    {
        $service = app(\App\Services\Admin\ProductService::class);
        $this->deleteProduct($id, $service);
    }

    public function deleteProduct($id, ProductService $service)
    {
        $product = Product::find($id);
        if ($product) {
            $service->deleteProduct($product);
            // Al borrar, limpiamos la selección por si acaso
            $this->dispatch('clear-selection'); 
            $this->dispatch('refresh-list'); 
        }
    }

    #[On('clear-selection')]
    public function clearSelection()
    {
        $this->selected = [];
    }

    public function toggleSelectAll()
    {
        // AHORA SÍ FUNCIONA: $this->products ya existe gracias a #[Computed]
        $pageIds = $this->products->pluck('id')->map(fn($id) => (string) $id)->toArray();

        $this->selected = array_map(fn($id) => (string) $id, $this->selected);

        $allSelected = count(array_intersect($pageIds, $this->selected)) === count($pageIds);

        if ($allSelected) {
            $this->selected = array_values(array_diff($this->selected, $pageIds));
        } else {
            $this->selected = array_unique(array_merge($this->selected, $pageIds));
        }
    }

    #[Computed]
    public function isAllSelected()
    {
        // AHORA SÍ FUNCIONA: $this->products ya existe
        $pageIds = $this->products->pluck('id')->map(fn($i) => (string) $i)->toArray();

        if (empty($pageIds)) {
            return false;
        }

        return count(array_intersect($pageIds, $this->selected)) === count($pageIds);
    }

    public function exportExcel($scope = 'all')
    {
        // Obtenemos la página actual de la paginación de Livewire
        $currentPage = $this->getPage(); 

        return Excel::download(
            new ProductsExport(
                $this->search, 
                $this->categoryFilter, 
                $scope, 
                $currentPage
            ), 
            'inventario_licup.xlsx'
        );
    }

    public function render()
    {
        // Ya no hacemos la consulta aquí, solo pasamos la computada a la vista
        return view('livewire.admin.products.product-list', [
            'products' => $this->products // Pasamos la propiedad computada
        ]);
    }
}
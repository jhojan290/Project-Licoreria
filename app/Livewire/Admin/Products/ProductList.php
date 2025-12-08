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

    // En App\Livewire\Admin\Products\ProductList.php

    public function toggleSelectAll()
    {
        // 1. Obtener IDs de la página actual como Strings
        $pageIds = $this->products->pluck('id')->map(fn($id) => (string) $id)->toArray();

        // 2. Calcular cuántos de estos ya están seleccionados
        $intersect = array_intersect($this->selected, $pageIds);

        // 3. LÓGICA SIMPLE (Igual a la del Carrito):
        // Si la cantidad de coincidencias es IGUAL al total de la página -> DESMARCAR TODO
        if (count($intersect) === count($pageIds)) {
            // Quitamos los IDs de esta página del array general
            $this->selected = array_values(array_diff($this->selected, $pageIds));
        } 
        // En cualquier otro caso (0 seleccionados, o 3 de 10 seleccionados) -> MARCAR TODO
        else {
            // Unimos los actuales con los nuevos y quitamos duplicados
            $this->selected = array_values(array_unique(array_merge($this->selected, $pageIds)));
        }
    }

    #[Computed]
    public function isAllSelected()
    {
        // 1. Obtener IDs página actual
        $pageIds = $this->products->pluck('id')->map(fn($id) => (string) $id)->toArray();

        if (empty($pageIds)) {
            return false;
        }

        // 2. Verificar si TODOS están dentro de la selección
        $intersect = array_intersect($this->selected, $pageIds);
        
        return count($intersect) === count($pageIds);
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
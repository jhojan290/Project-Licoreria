<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $search;
    protected $category;
    protected $scope; // 'all' o 'page'
    protected $page;  // Número de página actual

    // Recibimos nuevos parámetros
    public function __construct($search = null, $category = null, $scope = 'all', $page = 1)
    {
        $this->search = $search;
        $this->category = $category;
        $this->scope = $scope;
        $this->page = $page;
    }

    public function collection()
    
    {
        $query = Product::query();

        // --- LÓGICA DE FILTRADO ---
        
        // Si el scope es 'page', aplicamos los filtros (porque el usuario quiere ver SU tabla actual)
        // OJO: Aquí es donde estaba el "error". Antes aplicábamos filtros siempre.
        // Ahora vamos a aplicar filtros SIEMPRE, EXCEPTO si el usuario pide explícitamente TODO SIN FILTROS.
        
        // PERO, analizando tu petición: 
        // "Cuando estoy en cervezas y quiero descargar todo el inventario...".
        // Eso significa que 'Todo el inventario' debe ser literal: TODO (sin importar si busqué 'cerveza').

        if ($this->scope === 'all') {
            // Si es 'all', NO aplicamos ningún filtro -> Retornamos TODOS los productos de la BD.
            return $query->orderBy('created_at', 'desc')->get();
        }

        // Si NO es 'all' (es decir, es 'page' o una exportación filtrada personalizada),
        // entonces sí respetamos lo que el usuario está viendo en pantalla.
        $query->when($this->search, fn($q) => $q->where('name', 'like', '%'.$this->search.'%')
                                        ->orWhere('brand', 'like', '%'.$this->search.'%'))
            ->when($this->category, fn($q) => $q->where('category', $this->category));
            
        // Si es por página, limitamos
        if ($this->scope === 'page') {
            return $query->orderBy('created_at', 'desc')
                        ->forPage($this->page, 10)
                        ->get();
        }
        
        // Por defecto (si hubiera otro caso), retornamos filtrado pero sin paginar
        return $query->orderBy('created_at', 'desc')->get();
    }

    public function headings(): array
    {
        return ['Nombre', 'Marca', 'Categoría', 'Stock', 'Precio', 'Volumen', '% Alcohol', 'Descripción', 'Fecha Creación'];
    }

    public function map($product): array
    {
        return [
            $product->name, $product->brand, $product->category,
            $product->stock, $product->price, $product->volume, $product->alcohol_percentage,
            $product->description, $product->created_at->format('d/m/Y'),
        ];
    }
}
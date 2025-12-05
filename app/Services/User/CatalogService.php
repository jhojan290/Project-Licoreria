<?php

namespace App\Services\User;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class CatalogService
{
    public function getProducts(array $filters, string $sort)
    {
        $query = Product::query()->where('stock', '>', 0); // Solo disponibles

        // 1. BUSCADOR (Nombre o Marca)
        if (!empty($filters['search'])) {
            $query->where(function (Builder $q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('brand', 'like', '%' . $filters['search'] . '%');
            });
        }

        // 2. FILTRO: CATEGORÍA
        if (!empty($filters['category'])) {
            $query->where('category', $filters['category']);
        }

        // 3. FILTRO: MARCA
        if (!empty($filters['brand'])) {
            $query->where('brand', $filters['brand']);
        }

        // 4. FILTRO: RANGO DE PRECIO
        if (!empty($filters['priceRange'])) {
            match ($filters['priceRange']) {
                'low'  => $query->where('price', '<=', 50000),
                'mid'  => $query->whereBetween('price', [50001, 150000]),
                'high' => $query->where('price', '>', 150000),
                default => null
            };
        }


        if (!empty($filters['occasion'])) {
            if ($filters['occasion'] === 'gift') {
                // LÓGICA REGALO: Precio mayor a 100k O Categorías Premium
                $query->where(function($q) {
                    $q->where('price', '>=', 100000)
                    ->orWhereIn('category', ['Whiskey', 'Vino', 'Ginebra', 'Brandy']);
                });
            } elseif ($filters['occasion'] === 'party') {
                // LÓGICA FIESTA: Precio menor a 100k O Categorías de Fiesta
                $query->where(function($q) {
                    $q->where('price', '<', 100000)
                    ->orWhereIn('category', ['Aguardiente', 'Ron', 'Tequila', 'Cerveza', 'Vodka']);
                });
            }
        }

        // 5. ORDENAMIENTO (Sin popularidad)
        match ($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            default      => $query->orderBy('created_at', 'desc'), // Lo más nuevo
        };

        return $query->paginate(12);
    }

    // Auxiliares para llenar los filtros
    public function getCategories() {
        return Product::where('stock', '>', 0)->distinct()->orderBy('category')->pluck('category');
    }

    public function getBrands() {
        return Product::where('stock', '>', 0)->distinct()->orderBy('brand')->pluck('brand');
    }
}
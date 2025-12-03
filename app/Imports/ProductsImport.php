<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log; // <--- IMPORTANTE

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // 1. IMPRIMIR LA FILA EN LOS LOGS PARA VER QUÉ LLEGA
        Log::info('Procesando fila:', $row);

        // Validación mínima
        if (!isset($row['nombre'])) {
            Log::warning('Fila saltada: No tiene nombre', $row);
            return null;
        }

        try {
            // TU LÓGICA DE SIEMPRE...
            $product = Product::where('name', $row['nombre'])
                            ->where('brand', $row['marca']) // <--- OJO: ¿Tu excel tiene columna 'marca'?
                            ->first();

            $dataToSave = [
                'category'           => $row['categoria'],
                'stock'              => $row['stock'],
                'price'              => $row['precio'],
                'volume'             => $row['volumen'] ?? null,
                'alcohol_percentage' => $row['alcohol'] ?? null,
                'description'        => $row['descripcion'] ?? null,
            ];

            if ($product) {
                $product->update($dataToSave);
                Log::info('Producto Actualizado: ' . $row['nombre']);
            } else {
                $dataToSave['name'] = $row['nombre'];
                $dataToSave['brand'] = $row['marca']; // <--- Revisa que el Excel tenga 'marca'
                $dataToSave['image_path'] = 'products/no-image.png'; // Default
                
                Product::create($dataToSave);
                Log::info('Producto Creado: ' . $row['nombre']);
            }

            return $product;

        } catch (\Exception $e) {
            // SI FALLA, LO VERÁS AQUÍ
            Log::error('Error en fila ' . $row['nombre'] . ': ' . $e->getMessage());
            return null;
        }
    }
}
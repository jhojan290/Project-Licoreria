<?php

namespace App\Services\Admin;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductsImport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function createProduct(array $data)
    {
        if (isset($data['image'])) {
            // Guarda en storage/app/public/products
            $data['image_path'] = $data['image']->store('products', 'public');
        }
        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data)
    {
        if (isset($data['image'])) {
            // Borra la vieja si existe
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            $data['image_path'] = $data['image']->store('products', 'public');
        }

        $product->update($data);
        return $product;
    }

    public function deleteProduct(Product $product)
    {
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        return $product->delete();
    }

    public function deleteMultiple(array $ids)
    {
        // 1. Buscamos los productos para poder borrar sus imágenes primero
        $products = Product::whereIn('id', $ids)->get();

        foreach ($products as $product) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }
            // Borramos el registro
            $product->delete();
        }
    }

    public function importProducts($file)
    {
        Excel::import(new ProductsImport, $file);
    }
}
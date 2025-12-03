<?php

namespace App\Livewire\Admin\Products\Modal;

use Livewire\Component;
use App\Models\Product;
use App\Services\Admin\ProductService;
use Livewire\WithFileUploads;

class CreateProd extends Component
{
    use WithFileUploads;

    public $productId = null;
    public $isEditMode = false;
    public $excelFile;

    // Campos
    public $name, $brand, $category, $stock, $price, $description, $volume, $alcohol_percentage, $image, $existingImage;

    public function mount($productId = null)
    {
        $this->productId = $productId;
        if ($productId) {
            $this->isEditMode = true;
            $this->loadProduct();
        }
    }

    public function loadProduct()
    {
        $product = Product::find($this->productId);
        if ($product) {
            $this->name = $product->name;
            $this->brand = $product->brand;
            $this->category = $product->category;
            $this->stock = $product->stock;
            $this->price = $product->price;
            $this->volume = $product->volume; 
            $this->alcohol_percentage = $product->alcohol_percentage;
            $this->description = $product->description;
            $this->existingImage = $product->image_path;
            
        }
    }

    public function save(ProductService $service)
    {
        $this->validate([
            'name' => 'required|min:3',
            'brand' => 'required',
            'category' => 'required',
            'stock' => 'required|integer',
            'price' => 'required|numeric',
            'volume' => 'required|string', 
            'alcohol_percentage' => 'required|numeric|min:0|max:100',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = [
            'name' => $this->name,
            'brand' => $this->brand,
            'category' => $this->category,
            'stock' => $this->stock,
            'price' => $this->price,
            'volume' => $this->volume,
            'alcohol_percentage' => $this->alcohol_percentage,
            'description' => $this->description,
        ];

        if ($this->image) $data['image'] = $this->image;

        if ($this->isEditMode) {
            $service->updateProduct(Product::find($this->productId), $data);
        } else {
            $service->createProduct($data);
        }

        $this->dispatch('refresh-list'); 
        $this->dispatch('close-modal');
    }

    // 1. AGREGAR ESTA FUNCIÓN (HOOK)
    // Se ejecuta automáticamente cuando $excelFile termina de subir
    public function updatedExcelFile()
    {
        $this->importExcel();
    }

    // 2. TU FUNCIÓN DE IMPORTAR (Le quitamos el parámetro $service para inyección manual)
    public function importExcel()
    {
        $this->validate([
            'excelFile' => 'required|mimes:xlsx,xls,csv|max:10240',
        ]);

        // Inyectamos el servicio manualmente aquí
        $service = app(\App\Services\Admin\ProductService::class);

        try {
            $service->importProducts($this->excelFile);
            
            $this->dispatch('refresh-list');
            $this->dispatch('close-modal');
            $this->reset('excelFile');
            
        } catch (\Exception $e) {
            $this->addError('excelFile', 'Error: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.products.modal.create-prod');
    }
}
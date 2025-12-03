<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;

class ProductInventory extends Component
{
    public function render()
    {
        return view('livewire.admin.products.product-inventory')
        ->extends('layouts.admin')
        ->section('content');
    }
}

<?php

namespace App\Livewire\User\Pages\ProductsUser;

use Livewire\Component;

class ProductDetailsPage extends Component
{
    public function render()
    {
        return view('livewire.user.pages.products-user.product-details-page')
        ->extends('layouts.user')
        ->section('content');
    }
}

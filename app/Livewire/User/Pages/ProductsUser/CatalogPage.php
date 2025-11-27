<?php

namespace App\Livewire\User\Pages\ProductsUser;

use Livewire\Component;

class CatalogPage extends Component
{
    public function render()
    {
        return view('livewire.user.pages.products-user.catalog-page')
        ->extends('layouts.user')
        ->section('content');
    }
}

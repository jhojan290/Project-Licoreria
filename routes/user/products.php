<?php

use App\Livewire\User\Pages\ListCatalog;
use App\Livewire\User\Pages\ProductDetailsPage;

Route::get('/productos/catalogo',ListCatalog::class)->name('catalog');
Route::get('/producto/{id}', ProductDetailsPage::class)->name('product.detail');

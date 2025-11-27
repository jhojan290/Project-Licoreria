<?php

use App\Livewire\User\Pages\ProductsUser\CatalogPage;
use App\Livewire\User\Pages\ProductsUser\ProductDetailsPage;

Route::get('/productos/catalogo', CatalogPage::class)->name('catalog');
/*Route::get('/productos/detalles/{id}', ProductDetailsPage::class)->name('product.details');*/

Route::get('/productos/detalles', ProductDetailsPage::class)->name('product.details');
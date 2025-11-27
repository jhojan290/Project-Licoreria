<?php

use App\Livewire\Admin\Products\ProductList;
use App\Livewire\Admin\Products\Modal\CreateProd;
use App\Livewire\Admin\Products\Modal\EditProd;
use App\Livewire\Admin\Products\ProductDelete;

Route::get('/admin/products',ProductList::class)->name('admin.products');
Route::get('/admin/products/create',CreateProd::class)->name('admin.products.create');
Route::get('/admin/products/{id}/edit',EditProd::class)->name('admin.products.edit');
Route::get('/admin/products/{id}/delete',ProductDelete::class)->name('admin.products.delete');
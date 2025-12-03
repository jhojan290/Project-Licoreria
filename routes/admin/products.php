<?php

use App\Livewire\Admin\Products\ProductInventory;
use App\Livewire\Admin\Orders\OrdersPage;

Route::get('/admin/products',ProductInventory::class)->name('admin.products');
Route::get('/admin/orders', OrdersPage::class)->name('admin.orders');

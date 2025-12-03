<?php

use App\Livewire\Admin\Products\ProductInventory;
use App\Livewire\Admin\Orders\OrdersPage;
use App\Livewire\Admin\Orders\OrderDetailPage;

Route::get('/admin/products',ProductInventory::class)->name('admin.products');
Route::get('/admin/orders', OrdersPage::class)->name('admin.orders');
Route::get('/admin/orders/{id}', OrderDetailPage::class)->name('admin.orders.detail');
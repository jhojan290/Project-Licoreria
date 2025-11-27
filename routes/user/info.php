<?php

use App\Livewire\User\Pages\ContactPage;
use App\Livewire\User\Pages\AboutPage;


Route::get('/contact', ContactPage::class)->name('contact');
Route::get('/about', AboutPage::class)->name('about');
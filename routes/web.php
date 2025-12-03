<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\User\Pages\HomePage;
// ↓↓↓ 1. IMPORTAMOS EL COMPONENTE DE CHECKOUT ↓↓↓
use App\Livewire\User\Pages\CheckoutPage; 

/*
|--------------------------------------------------------------------------
|  RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::get('/', HomePage::class)->name('login');

// Reset Password
Route::get('/reset-password/{token}', App\Livewire\Auth\ResetPasswordForm::class)
    ->name('password.reset');

// Logout
Route::get('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect('/');
})->name('logout');


/*
|--------------------------------------------------------------------------
|  RUTAS DE ADMINISTRADOR (Protegidas)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    require __DIR__.'/admin/products.php';
});


/*
|--------------------------------------------------------------------------
| RUTAS DE USUARIO (Protegidas - Requieren Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    
    // ↓↓↓ 2. AQUÍ AGREGAMOS LA RUTA DE PAGO ↓↓↓
    // Al estar dentro de este grupo, si alguien intenta entrar sin login,
    // Laravel lo mandará automáticamente a la ruta con name('login') (tu Home).
    Route::get('/checkout', CheckoutPage::class)->name('checkout');

});


/*
|--------------------------------------------------------------------------
| RUTAS PÚBLICAS DE NAVEGACIÓN (Catálogo, Detalles, Info)
|--------------------------------------------------------------------------
| Estas quedan afuera del middleware para que los visitantes puedan verlas.
*/
require __DIR__.'/user/home.php';
require __DIR__.'/user/products.php'; // Aquí deben estar el catálogo y el detalle
require __DIR__.'/user/info.php';
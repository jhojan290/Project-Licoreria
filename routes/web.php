<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\User\Pages\HomePage;


Route::get('/', HomePage::class)->name('login');
/*
|--------------------------------------------------------------------------
|  LOGOUT
|--------------------------------------------------------------------------
| Puedes dejar esto aquí directo, es muy corto para tener un archivo aparte.
*/
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
| Aquí envolvemos tus archivos existentes con el Middleware.
| Solo quien sea 'admin' podrá acceder a las rutas que están dentro
| de 'admin/products.php'.
*/
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    require __DIR__.'/admin/products.php';
    
    // Si tienes más archivos de admin, cárgalos aquí dentro.
});


/*
|--------------------------------------------------------------------------
| RUTAS DE USUARIO (Protegidas)
|--------------------------------------------------------------------------
| Lo mismo para el usuario normal.
*/
Route::middleware(['auth', 'role:user'])->group(function () {
    
    require __DIR__.'/user/home.php';
    require __DIR__.'/user/products.php';
    require __DIR__.'/user/info.php';
    require __DIR__.'/user/cart.php';
    
});

Route::get('/reset-password/{token}', App\Livewire\Auth\ResetPasswordForm::class)
    ->name('password.reset');

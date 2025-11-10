<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('inicio');
});


Route::get('/inicio', function(){
    return view('inicio');
});


/*Route::get('/suma', function (){
    return view('suma');
});*/

Route::get('/suma', [SumaController::class, 'index']);

/*Route::post('/suma', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $resultado = $num1 + $num2;

    return view('suma', ['res' => $resultado]);
    
});*/

Route::post('/suma', [SumaController::class, 'suma']);

Route::get('/productos', [ProductoController::class, 'index']);
<?php

use Illuminate\Support\Facades\Route;

/*
use Spatie\Permission\Models\Role;
$role = Role::create(['name' => 'admin']);
$role = Role::create(['name' => 'cliente']);
*/
Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/catalogo', [App\Http\Controllers\FrontController::class, 'catalogo']);
Route::get('/catalogo/{producto:slug}', [\App\Http\Controllers\FrontController::class, 'producto']);

Route::view('/empresa', 'front.empresa');
Route::view('/preguntas', 'front.preguntas');
Route::view('/terminos', 'friont.terminos');

// Rutas del carrito
Route::post('/agregaritem', [\App\Http\Controllers\CarritoController::class, 'agregarItem'])->name('agregaritem');
Route::get('/vercarrito', [\App\Http\Controllers\CarritoController::class, 'verCarrito'])->name('vercarrito');
Route::get('/incrementar/{id}', [\App\Http\Controllers\CarritoController::class, 'incrementarCantidad'])->name('incrementarcantidad');
Route::get('/decrementar/{id}', [\App\Http\Controllers\CarritoController::class, 'decrementarCantidad'])->name('decrementarcantidad');
Route::get('/eliminaritem/{id}', [\App\Http\Controllers\CarritoController::class, 'eliminaritem'])->name('eliminaritem');
Route::get('/eliminarcarrito', [\App\Http\Controllers\CarritoController::class, 'eliminarcarrito'])->name('eliminarcarrito');
Route::get('confirmarcarrito', [\App\Http\Controllers\CarritoController::class, 'confirmarcarrito'])->name('confirmarcarrito');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    #Rutas para el administrador
    Route::resource('categoria', \App\Http\Controllers\Admin\CategoriaController::class, ["as"=> "admin"]);
    Route::resource('producto', \App\Http\Controllers\Admin\ProductoController::class, ["as" => "admin" ]);
    Route::resource('precio', \App\Http\Controllers\Admin\PrecioController::class,["as" => "admin"]);
    Route::resource('pedido', \App\Http\Controllers\Admin\PedidoController::class,["as" => "admin"]);
    Route::resource('user', \App\Http\Controllers\Admin\UserController::class,["as" => "admin"]);
});

Route::group(['prefix' => 'cliente', 'middleware' => ['auth', 'role:cliente']], function(){
    
});
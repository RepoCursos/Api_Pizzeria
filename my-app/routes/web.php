<?php

use Illuminate\Support\Facades\Route;

/*
use Spatie\Permission\Models\Role;
$role = Role::create(['name' => 'admin']);
$role = Role::create(['name' => 'cliente']);
*/
Route::get('/', function () { return view('welcome'); });

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
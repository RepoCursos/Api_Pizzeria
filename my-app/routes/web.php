<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function(){
    #Rutas para el administrador
    Route::resource('categoria', \App\Http\Controllers\Admin\CategoriaController::class, ["as"=> "admin"]);
    Route::resource('producto', \App\Http\Controllers\Admin\ProductoController::class, ["as" => "admin" ]);
    Route::resource('precio', \App\Http\Controllers\Admin\PrecioController::class,["as" => "admin"]);
});

Route::group(['prefix' => 'cliente', 'middleware' => ['auth', 'role:cliente']], function(){
    
});
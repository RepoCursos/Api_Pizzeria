<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $productos = Producto::wherePortada(true)->get();
        return view('welcome', compact('productos'));
    }

    public function catalogo(){
        $categoria = Categoria::all();
        return view('front.catalogo', compact("categorias"));
    }
}

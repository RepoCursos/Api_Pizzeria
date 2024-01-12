<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ProductoController extends Controller
{
    public function index(){
        if(Session::get("categoria_id")!=null){
            $productos = Producto::whereCategoria_id(Session::get("categoria_id"))->get(["id","nombre","urlfoto","precio"]);
            $categoria = Categoria::find(Session::get("categoria_id"));
            return view("admin.producto.index",compact("productos","categoria"));
        }
    }

    public function create(){
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.producto.create',compact("categorias"));
    }

    public function store(Request $request){
        $producto = new Producto($request->all());
        //Tratamiento de imagenes
        if ($request->hasFile('urlfoto')) {
            $file              = $request->file('urlfoto');
            $nombre            = $file->getClientOriginalName();
            $file->move(public_path('/img/'),$nombre);
            $producto->urlfoto = $nombre;
        }
        //Fin tratamiento de imagenes

        $producto->publicado = $request->publicado ? 1 : 0;
        $producto->portada   = $request->portada ? 1 : 0;
        $producto->slug      = Str::slug($request->nombre);
        $producto->save();
        return redirect('admin/producto');
    }

    public function edit($id){
        $producto = Producto::find($id);
        $categorias = Categoria::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('admin.producto.edit',compact("producto","categorias"));
    }

    public function update(Request $request, $id){
        $producto = Producto::findOrFail($id);
        $urlfotoanterior = $producto->urlfoto;
        $producto->fill($request->all());

        //Tratamiento de imagenes
        if ($request->hasFile('urlfoto')) {
            $rutaAnterior      = public_path("/img/".$urlfotoanterior);
            if ((file_exists($rutaAnterior)) && ($urlfotoanterior!=null)) {
                unlink (realpath($rutaAnterior));
            }
            $file              = $request->file('urlfoto');
            $nombre            = $file->getClientOriginalName();
            $file->move(public_path('/img/'),$nombre);
            $producto->urlfoto = $nombre;
        }
        //Fin tratamiento de imagenes

        $producto->publicado = $request->publicado ? 1 : 0;
        $producto->portada   = $request->portada ? 1 : 0;
        $producto->slug      = Str::slug($request->nombre);
        $producto->save();
        return redirect('admin/producto');
    }

    public function destroy($id){
        $producto = Producto::findOrFail($id);
        $rutaAnterior = public_path("/img/".$producto->urlfoto);
        if ((file_exists($rutaAnterior)) && ($producto->urlfoto!=null)) {
            unlink (realpath($rutaAnterior));
        }
        $producto->delete();
        return redirect('admin/producto');
    }

    public function show($id){
        Session::put("producto_id",$id);
        return redirect('admin/precio');
    }
}

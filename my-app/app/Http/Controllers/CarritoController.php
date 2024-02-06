<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use App\Models\Producto;
use Illuminate\Http\Request;
use Cart;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class CarritoController extends Controller
{
    public function agregaritem(Request $request){
        $producto = Producto::find($request->producto_id);
        $precio = Precio::find($request->precio_id);
        $_precio = $producto->precio;
        $_nombre = "";

        if(!empty($precio)){
            $_precio = $precio->precio;
            $_nombre = $precio->nombre;
        }

        Cart::add([
            'id' => $producto->id,
            'name' => $producto->nombre,
            'price' => $_precio,
            'qty' => 1,
            'weight' => 1,
            'options' => [
                'urlfoto' =>$producto->urlfoto,
                'nombre' => $_nombre,
            ]
        ]);
        return redirect()->back()->with("success","$producto->nombre | Se ha agregado correctamente al carrito");
    }

    public function verCarrito(){
        return view('front.carrito');
    }

    public function incrementarcantidad(Request $request){
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id,["qty"=>$item->qty+1]);
        return back()->with("success","Se agrego una unidad");
    }

    public function decrementarcantidad(Request $request){
        $item = Cart::content()->where("rowId", $request->id)->first();
        Cart::update($request->id,["qty"=>$item->qty-1]);
        return back()->with("success","Se elimino una unidad");
    }
}

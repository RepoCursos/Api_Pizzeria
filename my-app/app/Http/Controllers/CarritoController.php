<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Pedido;
use App\Models\Precio;
use App\Models\Producto;
use Illuminate\Http\Request;
use Cart;


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

    public function eliminaritem(Request $request){
        Cart::remove($request->id);
        return back()->with("success","Item eliminado correctamente!");
    }

    public function eliminarcarrito(){
        Cart::destroy();
        return back()->with("success", "Carrito eliminado correctamente!");
    }

    public function confirmarcarrito(){
        $pedido = new Pedido();
        $pedido->subtotal    = Cart::subtotal();
        $pedido->impuesto    = Cart::tax();
        $pedido->total       = Cart::total();
        $pedido->fechapedido = date("Y-m-d h:m:s");
        $pedido->procedencia = "web";
        $pedido->estado      = "nuevo";
        $pedido->user_id     = auth()->user()->id;
        $pedido->save();

        foreach (Cart::content() as $item) {
            $detalle = new Detalle();
            $detalle->precio      = $item->price;
            $detalle->catnidad    = $item->qty;
            $detalle->importe     = $item->price * $item->qty;
            $detalle->medida      = $item->options->nombre;
            $detalle->producto_id = $item->id;
            $detalle->pedido_id   = $pedido->id;
            $detalle->save();
        } 
        Cart::destroy();
        return back()->with("success", "Su solicitud fue cargada con exito!");
    }
}

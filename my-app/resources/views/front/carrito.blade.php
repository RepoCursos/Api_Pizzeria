@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 bg-light">
                <h1 class="text-center fs-4 p-3">Carrito</h1>
                <table class="table table-striped">
                    <thead>
                        <th>Foto</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Importe</th>
                        <th>X</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td><img src="/img/{{ $item->options->urlfoto }}" width="100"></td>
                                <td>{{ $item->nombre }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                        <a href="" class="btn btn-success">-</a>
                                        <button type="button" class="btn">{{ $item->qty }}</button>
                                        <a href="" class="btn btn-success">+</a>
                                    </div>
                                </td>
                                <td> {{ number_format($item->qty * $item->price,2) }} </td>
                                <td> <a href="" class="btn btn-sm text-danger">X</a> </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"><p class="text-end m-0 p-0">Subtotal $ {{ Cart::subtotal() }} </p></td>
                        </tr>
                        <tr>
                            <td colspan="4"><p class="text-end m-0 p-0">IVA 22% $ {{ Cart::tax() }} </p></td>
                        </tr>
                        <tr>
                            <td colspan="4"><p class="text-end m-0 p-0">TOTAL $ {{ Cart::total() }} </p></td>
                        </tr>
                    </tbody>
                </table>
                <div class="row justify-content-center mt-5 mb-5 text-center">
                    <div class="col-sm-4">
                        <a href="" class="btn btn-outline-danger">Eliminar carrito</a>
                    </div>
                    <div class="col-sm-4">
                        @auth
                            <a href="" class="btn btn-danger">Procesar Pedido</a>
                        @else
                            <a href="/login" class="btn btn-danger">Registrarse</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

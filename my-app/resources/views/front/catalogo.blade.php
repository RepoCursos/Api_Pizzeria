@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center fs-4">CATALOGO</h1>
                <div class="row">
                    @foreach ($categorias as $c)
                        <div class="col-sm-12">
                            <h2 class="text-center mt-5">{{ $c->nombre }}</h2>
                            <div class="row justify-content-center">
                                @forelse ($c->productos as $p)
                                    <div class="col-sm-4 mt-3 mb-3">
                                        <div class="card">
                                            <img src="/img/{{ $p->urlfoto }}" class="card-img-top">
                                            <div class="card-body text-center">
                                                @if ($p->precios->count())
                                                    <p id="txtprecio{{ $p->id }}">$ {{ $p->precios[0]->precio }}</p>
                                                    <select name="precios" id="{{ $p->id }}"
                                                        class="form-control precios">
                                                        @foreach ($p->precios as $pr)
                                                            <option value="{{ $pr->precio }}"> {{ $pr->nombre }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p>$ {{ $p->precio }}</p>
                                                @endif
                                            </div>
                                            <div class="card-footer">
                                                <a href="/catalogo/{{ $p->slug }}"
                                                    class="btn btn-outline-success w-100">{{ $p->nombre }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            @if (count(Cart::content()))
                <div class="col-sm-3">
                    <p class="text-center">Resumen Carrito</p>
                    <table class="table table-striped">
                        <tbody>
                            @foreach (Cart::content() as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    <td>{{ $item->qty }} x {{ $item->price }}</td>
                                    <td>{{ number_format($item->qty * $item->price,2) }}</td>
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
                    <p class="text-center"><a href="/vercarrito" class="btn btn-outline-success btn-sm"> Ver carrito</a></p>
                </div>
            @endif
        </div>
    </div>
    <script>
        var selectprecios = document.querySelectorAll(".precios")
        selectprecios.forEach(element => {
            document.getElementById(element.id).addEventListener("change", e => {
                document.getElementById("txtprecio" + e.target.id).textContent = "$ " + e.target.value
            })
        });
    </script>
@endsection

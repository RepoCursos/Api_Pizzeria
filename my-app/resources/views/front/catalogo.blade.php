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
                                            <a href="/catalogo/{{ $p->slug }}">
                                                <img src="/img/{{ $p->urlfoto }}" class="card-img-top">
                                            </a>
                                            <div class="card-body text-center">
                                                @if ($p->precios->count())
                                                    <p class="fw-bold fs-4" id="txtprecio{{ $p->id }}">$ {{ $p->precios[0]->precio }}</p>
                                                    <select name="precios" id="{{ $p->id }}" class="form-control precios">
                                                        @foreach ($p->precios as $pr)
                                                            <option value="{{ $pr->precio }}" data-precioid="{{ $pr->id }}"> {{ $pr->nombre }} </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p class="fw-bold fs-4">$ {{ $p->precio }}</p>
                                                @endif
                                                <a href="/catalogo/{{ $p->slug }}">{{ $p->nombre }}</a>
                                            </div>
                                            <div class="card-footer">
                                                <form action="{{ route('agregaritem') }}" method="post">
                                                    @csrf
                                                    @if ($p->precios->count())
                                                        <input type="hidden" name="precio_id" id="precio_{{ $p->id }}" value="{{ $p->precios[0]->id }}">
                                                    @endif
                                                    <input type="hidden" name="producto_id" value="{{ $p->id }}">
                                                    <input type="submit" value="AGREGAR" class="btn btn-success w-100">    
                                                </form>
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
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }} x {{ $item->price }}</td>
                                    <td>{{ number_format($item->qty * $item->price,2) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><p class="text-end m-0 p-0">Subtotal $ {{ Cart::subtotal() }} </p></td>
                            </tr>
                            <tr>
                                <td colspan="4"><p class="text-end m-0 p-0">IVA 22%  $ {{ Cart::tax() }} </p></td>
                            </tr>
                            <tr>
                                <td colspan="4"><p class="text-end m-0 p-0">TOTAL    $ {{ Cart::total() }} </p></td>
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
            document.getElementById("precio_" + e.target.id).value = element.options[element.selectedIndex].dataset.precioid
        })
    });
</script>
@endsection

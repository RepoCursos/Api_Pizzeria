@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-sm-6">
                        <img src="/img/{{ $producto->urlfoto }}" class="img-fluid mx-auto d-block" style="width:300px; height:300px;">
                    </div>
                    <div class="col-sm-6 bg-light pt-5 pb-5">
                        <h1>{{ $producto->nombre }}</h1>
                        @if ($producto->precios->count())
                            <p id="txtprecio{{ $producto->id }}">$ {{ $producto->precios[0]->precio }}</p>
                            <select name="precios" id="{{ $producto->id }}" class="form-control precios">
                                @foreach ($producto->precios as $item)
                                    <option value="{{ $item->precio }}"> {{ $item->nombre }} </option>
                                @endforeach
                            </select>
                        @else
                            <p>$ {{ $producto->precio }}</p>
                        @endif
                    </div>
                    
                    <div class="col-sm-12 mt-5">
                        {{ $producto->descripcion }}
                    </div> 
                </div>
            </div>
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

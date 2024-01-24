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
                                                    <select name="precios" id="{{ $p->id }}" class="form-control precios">
                                                        @foreach ($p->precios as $pr)
                                
                                                            <option value="{{ $pr->precio }}"> {{ $pr->nombre }} </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <p>$ {{ $p->precio }}</p>
                                                @endif
                                            </div>
                                            <div class="card-footer">
                                                <a href="/producto/{{ $p->slug }}"
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
        </div>
    </div>
<script>
    var selectprecios = document.querySelectorAll(".precios")
    selectprecios.forEach(element => {
        document.getElementById(element.id).addEventListener("change", e=>{
            document.getElementById("txtprecio"+e.target.id).textContent = "$ "+e.target.value
        })
    });
</script>
@endsection

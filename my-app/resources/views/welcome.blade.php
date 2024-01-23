@extends('layouts.app')
@section('content')
<div class="container-fluid bg-danger">
    <img src="/img/banner.png" alt="Pide tu pizza" class="img-fluid mx-auto d-block">
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center mt-5 mb-3">Piede ahora tu pizza en Montevideo!</h1>

            <div class="row">
                @foreach ($productos as $p)
                <div class="col-sm-3 mt-3 mb-3">
                    <div class="card">
                        <img src="/img/{{ $p->urlfoto }}" alt="" class="card-img-top">

                        <div class="card-body text-center">
                            <p>{{ $p->precio }}</p>
                        </div>
                        <div class="card-footer">
                            <a href="/producto/{{ $p->slug }}" class="btn btn-outline-success w-100">{{ $p->nombre }}</a>
                        </div>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

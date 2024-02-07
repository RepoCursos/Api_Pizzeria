@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include("admin.menu")
        <div class="col-sm-8">
            <h1 class="mt-3 mb-3 fs-4">SECCION CATEGORIAS</h1>
            <a href="{{route("admin.categoria.create") }}" class="btn btn-success">CREAR CATEGORIA</a>
            @if ($categorias->count())     
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>ACCION</th>
                </tr>

                @forelse ($categorias as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nombre}}</td>
                    <td>
                        <a href="{{route("admin.categoria.show",$c->id)}}" class="btn btn-success">VER PRODUCTOS</a>
                        <a href="{{route("admin.categoria.edit",$c->id)}}" class="btn btn-success">EDITAR CATEGORIAS</a>
                    </td>
                </tr>
                @empty
                    <tr><td></td></tr>
                @endforelse
            </table>
            @endif
        </div>
    </div>
</div>
@endsection

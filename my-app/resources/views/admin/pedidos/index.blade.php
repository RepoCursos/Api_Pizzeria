@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include("admin.menu")
        <div class="col-sm-8">
            <h1 class="mt-3 mb-3 fs-4">SECCION PEDIDO</h1>
            @if ($pedidos->count())

            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>CLIENTE</th>
                    <th>FECHA PEDIDO</th>
                    <th>PROCEDENCIA</th>
                    <th>TOTAL $</th>
                    <th>ESTADO</th>
                    <th>ACCION</th>
                </tr>

                @forelse ($pedidos as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->user->name }}</td>
                    <td>{{ $c->fechapedido }}</td>
                    <td>{{ $c->procedencia }}</td>
                    <td>{{ $c->total }}</td>
                    <td>{{ $c->estado }}</td>
                    <td>
                        <a href="{{route("admin.pedido.edit",$c->id)}}" class="btn btn-success">VER DETALLE</a>
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

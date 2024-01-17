@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include("admin.menu")
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="fs-4">PEDIDO N: {{ $pedido->id }} {{ strtoupper($pedido->estado )}}</h1>
                        </div>
                        <div class="col-sm-6">
                            {{!! Form::open(['route'=>['admin.pedido.update',$pedido], 'method'=>'PUT']) !!}}
                            <div class="row">
                                <div class="col-6">
                                    {{!! Form::select('estado',["nuevo"=>"NUEVO", "proceso"=>"Proceso", "entregado"=>"Entregado"],$pedido->estado,['class'=>'form-control','required']) !!}}
                                </div>
                                <div class="col-6">
                                    {{!! Form::submit('ACTUALIZAR',['class'=>'btn btn-success w-100']) !!}}
                                </div>
                            </div>
                            {{!! Form::close() !!}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Cliente: {{ $pedido->user->name }}</li>
                        <li class="list-group-item">Celular: {{ $pedido->user->celular }}</li>
                        <li class="list-group-item">Email: {{ $pedido->user->email }}</li>
                        <li class="list-group-item">Direccion: {{ $pedido->user->direccion }}</li>
                        <li class="list-group-item">Fecha Pedido: {{ $pedido->user->fechapedido }}</li>
                    </ul>
                </div>
                <table class="table table-striped">
                    <thead>
                        <th>PRODUCTO</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>IMPORTE</th>
                    </thead>
                    <tbody>
                        @forelse ($pedido->detalles as $item)
                            <tr>
                                <td>{{ $item->producto->nombre }}</td>
                                <td>{{ $item->cantidad }}</td>
                                <td>{{ $item->precio }}</td>
                                <td>{{ $item->importe }}</td>
                            </tr>
                        @empty
                            
                        @endforelse

                        <tr><td colspan="4" class="text-end">SUB TOTAL: {{ $pedido->subtotal }} </td></tr>
                        <tr><td colspan="4" class="text-end">IVA 22%: {{ $pedido->impuesto }}</td></tr>
                        <tr><td colspan="4" class="text-end">TOTAL: {{ $pedido->total }}</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
        <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
    </div>
</div>
@endsection
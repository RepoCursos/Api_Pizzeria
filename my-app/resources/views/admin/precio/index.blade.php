@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include("admin.menu")
        <div class="col-sm-8">
            <a href="/admin/categoria">{{$producto->categoria->nombre}}</a>
            <a href="/admin/producto">{{$producto->nombre}}</a> <br>
            <a href="{{route("admin.precio.create")}}" class="btn btn-success">CREAR PRECIO</a>   
            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>ACCION</th>
                </tr>

                @forelse ($precios as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td>{{$c->nombre}}</td>
                    <td>{{$c->precio}}</td>
                    <td>
                        <a href="{{route("admin.precio.edit",$c->id)}}" class="btn btn-success">EDITAR PRECIO</a>
                        {!! Form::open(['method'=> 'DELETE','route'=> ['admin.precio.destroy', $c->id], 'style'=>'display:inline']) !!}
                            {!! Form::submit('ELIMINAR PRECIO', ['class'=>'btn btn-success','onclick'=>'return confirm("Eliminar precio?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @empty
                    <tr><td></td></tr>
                @endforelse
            </table>
            <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
        </div>
    </div>
</div>
@endsection
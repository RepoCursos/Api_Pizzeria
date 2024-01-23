@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include("admin.menu")
        <div class="col-sm-8">
            <a href="/admin/categoria">{{$categoria->nombre}}</a> <br>
            <a href="{{route("admin.producto.create") }}" class="btn btn-success">CREAR PRODUCTO</a>   
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>FOTO</th>
                    <th>NOMBRE</th>
                    <th>PRECIO</th>
                    <th>ACCION</th>
                </tr>

                @forelse ($productos as $c)
                <tr>
                    <td>{{$c->id}}</td>
                    <td><img src="/img/{{$c->urlfoto}}" width="100" class="border"></td>
                    <td>{{$c->nombre}}</td>
                    <td>     
                        <ul>
                            @forelse ($c->precios as $p)
                                <li>{{ $p->nombre }} : ${{ $p->precio }}</li>
                            @empty

                            @endforelse
                        </ul>
                    </td>                    
                    <td>
                        <a href="{{route("admin.producto.show",$c->id)}}" class="btn btn-success">AGREGAR PRECIOS</a>
                        <a href="{{route("admin.producto.edit",$c->id)}}" class="btn btn-success">EDITAR PRODUCTO</a>
                        {!! Form::open(['method'=> 'DELETE','route'=> ['admin.producto.destroy', $c->id], 'style'=>'display:inline']) !!}
                            {!! Form::submit('ELIMINAR PRODUCTO', ['class'=>'btn btn-success','onclick'=>'return confirm("Eliminar producto?")']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
                @empty
                    <tr><td></td></tr>
                @endforelse
            </table>
        </div>
    </div>
</div>
@endsection

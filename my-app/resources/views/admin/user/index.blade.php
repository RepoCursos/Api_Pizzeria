@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        @include("admin.menu")
        <div class="col-sm-8">
            <h1 class="mt-3 mb-3 fs-4">SECCION CLIENTE</h1>
            <a href="{{ route("admin.user.create") }}" class="btn btn-success">CREAR USUARIO</a>
            @if ($users->count())

            <table class="table table-bordered mt-3">
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CELULAR</th>
                    <th>DIRECCION</th>
                    <th>ACCION</th>
                </tr>

                @forelse ($users as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->celular }}</td>
                    <td>{{ $c->direccion }}</td>
                    <td>
                        <a href="{{route("admin.user.edit",$c->id)}}" class="btn btn-success">EDITAR USUARIO</a>
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

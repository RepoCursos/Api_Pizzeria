@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include("admin.menu")
        <div class="col-sm-8">
            {!! Form::open(['route'=>['admin.precio.update',$precio],'method'=>'PUT']) !!}
            <div class="form-group row">
                <div class="col-sm-6">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',$precio->nombre,['class'=>'form-control','required']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('precio','Precio') !!}
                    {!! Form::text('precio',$precio->precio,['class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class="form-group mt-3">
                <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
                {{ Form::submit('CREAR PRECIO',['class'=>'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
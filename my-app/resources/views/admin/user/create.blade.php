@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include("admin.menu")
        <div class="col-sm-8">
            {!! Form::open(['route'=>'admin.user.store','method'=>'POST']) !!}
            <div class="form-group row">
                <div class="col-sm-6">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',null,['class'=>'form-control', 'required']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('celular','Celular') !!}
                    {!! Form::text('celular',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('direccion','Direccion') !!}
                    {!! Form::text('direccion',null,['class'=>'form-control']) !!}
                </div>
            </div>
            
            <div class="form-group mt-3">
                <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
                {{ Form::submit('CREAR USUARIO',['class'=>'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
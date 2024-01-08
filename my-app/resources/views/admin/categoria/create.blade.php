@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include("admin.menu")
        <div class="col-sm-8">
            {!! Form::open(['route'=>'admin.categoria.store','method'=>'POST']) !!}
            <div class="form-group row">
                <div class="col-sm-6">
                    {!! Form::label('slug','Slug') !!}
                    {!! Form::text('slug',null,['class'=>'form-control','required']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::label('nombre','Nombre') !!}
                    {!! Form::text('nombre',null,['class'=>'form-control','required']) !!}
                </div>
            </div>
            <div class="form-group mt-3">
                <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
                {{ Form::submit('CREAR CATEGORIA',['class'=>'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
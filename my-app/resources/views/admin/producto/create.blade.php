@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include("admin.menu")
        <div class="col-sm-8">
            {!! Form::open(['route'=>'admin.producto.store','method'=>'POST','files'=>true]) !!}

            <div class="form-group mt-3">
                {!! Form::label('nombre','Nombre') !!}
                {!! Form::text('nombre',null,['class'=>'form-control','required']) !!}
            </div>
            <div class="form-group mt-3">
                {!! Form::label('descripcion','Descripcion') !!}
                {!! Form::textarea('descripcion',null,['class'=>'form-control','rows'=>3, 'maxlength'=>600]) !!}
            </div>
            <div class="form-group row mt-3">
                <div class="col-sm-3">
                    {!! Form::label('precio','Precio') !!}
                    {!! Form::text('precio',null,['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('stock','Stock') !!}
                    {!! Form::text('stock',null,['class'=>'form-control','required']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('orden','Orden') !!}
                    {!! Form::text('orden',null,['class'=>'form-control','required']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('categoria_id','Categoria') !!}
                    {!! Form::select('categoria_id',$categorias,null,['class'=>'form-control','required']) !!}
                </div>
            </div>
            
            <div class="form-group mt-3">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-check form-switch">
                            {!! Form::checkbox('publicado',null,null,["class"=>"form-check-input"]) !!}
                            {!! Form::label('publicado','Publicado',['class'=>'form-check-lable']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-check form-switch">
                            {!! Form::checkbox('portada',null,null,["class"=>"form-check-input"]) !!}
                            {!! Form::label('portada','Portada',['class'=>'form-check-lable']) !!}
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                {!! Form::label('urlfoto','Imagen',["class"=>"control-label"]) !!} <br>
                {!! Form::file('urlfoto',['class'=>'form-control']) !!}
            </div>


            <div class="form-group mt-3">
                <a href="javascript: history.go(-1)" class="btn btn-outline-primary">REGRESAR</a>
                {{ Form::submit('CREAR PRODUCTO',['class'=>'btn btn-success']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
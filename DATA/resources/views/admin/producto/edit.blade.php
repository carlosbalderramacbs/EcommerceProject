@extends('adminlte::page')

@section('title', 'Editar Producto')

@section('content_header')
    <h1>Editar Productos</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-sucess">
        <strong>{{session('info')}}</strong>
    </div>
@endif
   <form action="/productos/{{$producto->id}}" method="POST">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="codigo" type="text" class="form-control" value="{{$producto->codigo}}">    
    {!!$errors->first('codigo','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$producto->nombre}}">
    {!!$errors->first('nombre','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" value="{{$producto->cantidad}}">
    {!!$errors->first('cantidad','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$producto->precio}}">
    {!!$errors->first('precio','<small>:message</small><br>')!!}
  </div>
  <a href="/productos" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop
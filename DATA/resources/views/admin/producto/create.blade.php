@extends('adminlte::page')

@section('title', 'Agregar Producto')

@section('content_header')
   <h1>Agregar Producto</h1>
@stop

@section('content')
@if (session('info'))
    <div class="alert alert-sucess">
        <strong>{{session('info')}}</strong>
    </div>
@endif
    
<form action="/productos" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Código</label>
    <input id="codigo" name="codigo" type="text" class="form-control" tabindex="1">  
    {!!$errors->first('codigo','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="2">
    {!!$errors->first('nombre','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Cantidad</label>
    <input id="cantidad" name="cantidad" type="number" class="form-control" tabindex="3">
    {!!$errors->first('cantidad','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control" tabindex="3">
    {!!$errors->first('precio','<small>:message</small><br>')!!}
  </div>
  <a href="{{route('admin.productos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop
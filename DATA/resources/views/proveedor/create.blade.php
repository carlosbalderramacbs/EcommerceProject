@extends('adminlte::page')

@section('title', 'Agregar Proveedor')

@section('content_header')
   <h1>Agregar Proveedor</h1>
@stop

@section('content')
    
<form action="/proveedores" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1">    
    {!!$errors->first('nombre','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" tabindex="2">
    {!!$errors->first('email','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input id="telf" name="telf" type="number" class="form-control" tabindex="3">
    {!!$errors->first('telf','<small>:message</small><br>')!!}
  </div>
  <a href="/proveedores" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop
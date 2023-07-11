@extends('adminlte::page')

@section('title', 'Editar Proveedor')

@section('content_header')
    <h1>Editar Proveedor</h1>
@stop

@section('content')
   <form action="/proveedores/{{$proveedor->id}}" method="POST">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" value="{{$proveedor->nombre}}">    
    {!!$errors->first('nombre','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" value="{{$proveedor->email}}">
    {!!$errors->first('email','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Telefono</label>
    <input id="telf" name="telf" type="number" class="form-control" value="{{$proveedor->telf}}">
    {!!$errors->first('telf','<small>:message</small><br>')!!}
  </div>
  
  <a href="/proveedores" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  

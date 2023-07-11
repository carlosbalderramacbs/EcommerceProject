@extends('adminlte::page')

@section('title', 'Agregar Proveedor')

@section('content_header')
   <h1>Agregar Usuario</h1>
@stop

@section('content')
    
<form action="{{route('admin.usuarios.store')}}" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" tabindex="1">    
    {!!$errors->first('nombre','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" tabindex="2">
    {!!$errors->first('email','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">password</label>
    <input id="password" name="password" type="password" class="form-control" tabindex="3">
    {!!$errors->first('password','<small>:message</small><br>')!!}
  </div>
  <a href="{{route('admin.usuarios.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop
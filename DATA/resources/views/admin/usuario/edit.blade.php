@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
   <form action="/usuarios/{{$usuario->id}}" method="POST">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$usuario->name}}">    
    {!!$errors->first('name','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">email</label>
    <input id="email" name="email" type="text" class="form-control" value="{{$usuario->email}}">
    {!!$errors->first('email','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">password</label>
    <input id="password" name="password" type="password" class="form-control" value="{{$usuario->password}}">
    {!!$errors->first('password','<small>:message</small><br>')!!}
  </div>
  
  <a href="/usuarios" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
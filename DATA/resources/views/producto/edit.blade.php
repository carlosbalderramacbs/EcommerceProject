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
   <form action="/productos/{{$product->id}}" method="POST">    
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$product->name}}">    
    {!!$errors->first('name','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Slug</label>
    <input id="slug" name="slug" type="text" class="form-control" value="{{$product->name}}">    
    {!!$errors->first('slug','<small>:message</small><br>')!!}
  </div>  
  <div class="mb-3">
    <label for="" class="form-label">Breve Descripcion</label>
    <textarea id="b_descripcion" name="b_descripcion" type="text"   value="{{$product->short_description}}" class="form-control" placeholder="Descripcion"></textarea>
        {!!$errors->first('b_descripcion','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <textarea id="descripcion" name="descripcion" type="text"   value="{{$product->description}}" class="form-control" placeholder="Descripcion"></textarea>
        {!!$errors->first('descripcion','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$product->regular_price}}">
    {!!$errors->first('precio','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">SKU</label>
    <input id="sku" name="sku" type="text" class="form-control" value="{{$product->SKU}}">    
    {!!$errors->first('sku','<small>:message</small><br>')!!}
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
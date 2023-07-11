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
    <label for="" class="form-label">Nombre</label>
    <input id="name" name="name" type="text" class="form-control" value="{{$products->name}}">    
    {!!$errors->first('name','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Slug</label>
    <input id="slug" name="slug" type="text" class="form-control" value="{{$products->slug}}">    
    {!!$errors->first('slug','<small>:message</small><br>')!!}
  </div>  
  <div class="mb-3">
    <label for="" class="form-label">Breve Descripcion</label>
    <textarea id="b_descripcion" name="b_descripcion" type="text"   value="{{$products->short_description}}" class="form-control" placeholder="Descripcion"></textarea>
        {!!$errors->first('b_descripcion','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <textarea id="descripcion" name="descripcion" type="text"   value="{{$products->description}}" class="form-control" placeholder="Descripcion"></textarea>
        {!!$errors->first('descripcion','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input id="precio" name="precio" type="number" step="any" class="form-control" value="{{$products->regular_price}}">
    {!!$errors->first('precio','<small>:message</small><br>')!!}
  </div>
  <div class="mb-3">
    <label for="" class="form-label">SKU</label>
    <input id="sku" name="sku" type="text" class="form-control" value="{{$products->SKU}}">    
    {!!$errors->first('sku','<small>:message</small><br>')!!}
  </div> 



























  {{-- <div class="mb-3">
    <form class "form-horizontal" enctype="multipart/form-data">
      <div class ="form-group">
        <label class="col-md-4 control-label">Nombre Producto</label>
        <div class="col-md-4">
          <input type="text" placeholder="Nombre Producto" class="form-control input-md"/>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Slug</label>
        <div class="col-md-4">
          <input type="text" placeholder="Slug Producto" class="form-control input-md"/>
        </div>
      </div>
      
      <div class ="form-group">
        <label class="col-md-4 control-label">Breve Descripcion</label>
        <div class="col-md-4">
          <textarea type="text" placeholder="Breve Descripcion"></textarea>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Descripcion</label>
        <div class="col-md-4">
          <textarea  type="text" placeholder="Descripcion"></textarea>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Precio</label>
        <div class="col-md-4">
          <input type="text" placeholder="Precio" class="form-control input-md"/>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">SKU</label>
        <div class="col-md-4">
          <input type="text" placeholder="SKU" class="form-control input-md"/>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Estado</label>
        <div class="col-md-4">
          <select class="form-control">
            <option value="instock">Disponible</option>
            <option value="outofstock">Agotado</option>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Cantidad</label>
        <div class="col-md-4">
          <input type="text" placeholder="Cantidad" class="form-control input-md"/>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Cantidad</label>
        <div class="col-md-4">
          <input type="file"  class="input-file"/>
        </div>
      </div>
      <div class ="form-group">
        <label class="col-md-4 control-label">Categoria</label>
        <div class="col-md-4">
          <option value="">Seleccionar Categoria</option>
          @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </div>
      </div>
  </div> --}}
  <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>


  <div class="panel-body">
    
  

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')  
@stop
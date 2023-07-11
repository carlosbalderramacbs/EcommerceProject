@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de productos</h1>
@stop

@section('content')
   <a href="productos/create" class="btn btn-primary mb-3">Agregar Producto</a>

<table id="productos" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Categoria</th>
            <th scope="col">Fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td><img src="{{asset('assets/images/products')}}/{{$product->image}}" width="60"/></td>
            <td>{{$product->name}}</td>
            <td>{{$product->stock_status}}</td>
            <td>{{$product->regular_price}}</td>
           {{--  <td>{{$product->category->name}}</td> --}}
            <td>{{$product->created_at}}</td>
           {{--  <td>{{$product->cantidad}}</td>
            <td>{{$product->precio}}</td> --}}
            {{-- <td>
                <form action="{{ route ('productos.destroy',$producto->id)}}" method="POST">
                <a href="/productos/{{ $producto->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#productos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
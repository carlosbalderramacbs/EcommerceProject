@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Proveedores</h1>
@stop

@section('content')
   <a href="proveedores/create" class="btn btn-primary mb-3">Agregar Proveedor</a>
   <a href="/downloadprovider-pdf" class="btn btn-primary mb-3">Exportar PDF</a>
<table id="proveedores" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor)
        <tr>
            <td>{{ $proveedor->id}}</td>
            <td>{{$proveedor->nombre}}</td>
            <td>{{$proveedor->email}}</td>
            <td>{{$proveedor->telf}}</td>
            
            <td>
                <form action="{{ route ('proveedores.destroy',$proveedor->id)}}" method="POST">
                <a href="/proveedores/{{ $proveedor->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
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
<script src=https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#proveedores').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
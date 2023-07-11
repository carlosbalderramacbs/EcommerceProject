@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
   <a href="usuarios/create" class="btn btn-primary mb-3">Agregar Usuario</a>
   <a href="/download-pdf" class="btn btn-primary mb-3">Exportar PDF</a>

<table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Rol</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        <canvas id="myChart" width="400" height="400"></canvas>

        @foreach ($usuarios as $usuario)
        <tr>
            
            <td>{{ $usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->utype}}</td>          
            
            <td>
                <form action="{{ route ('usuarios.destroy',$usuario->id)}}" method="POST">
                <a href="/usuarios/{{ $usuario->id}}/edit" class="btn btn-info">Editar</a>
                @csrf
                @method('DELETE')
                <button onclick="return confirm('¿Estas Seguro?') type="submit" class="btn btn-danger">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@section('scripts')
<script src=https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js></script>


<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
@endsection

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>
<script src=https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js></script>
<script>
$(document).ready(function() {
    $('#usuarios').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
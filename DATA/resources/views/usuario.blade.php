 <!DOCTYPE html>
 <html lang="es">
 <head>
     <link rel="stylesheet" href="./bs3.min.css">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Reporte de usuarios</title>
     <style>
        #emp{
            font-family:Arial,Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%
        }
        #emp td,#emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #emp tr:nth-child(even){
            background-color: #ffffff;
        }
        #emp th{
            padding-top: 12px;
            padding-botton: 12px;
            text-align: left;
            background-color:  #f00000;
            color: #fff;
        }
        /* rel="stylesheet" href="/css/admin_custom.css";
        href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"; */
    </style>
    </head>
 <body>
 <div class="container-fluid">
     <div class="row">
         
         <div class="col-xs-4">
             <img src="{{ public_path("assets/images/julios.png") }}" alt="Logotipo" align="right" class="right" style="width: 150px; height: 150px;"> 
            </div>             
            <div class="row text-center" style="margin-bottom: 2rem;">
                <i align="right">Ferreteria Julio's </i><br>
                <i align="right">Direccion: Calle Junin #1602. esq sucre </i><br>
                <i align="right">Telefono: 4060729- 6507521 </i><br>
            </div>
     </div>               
     
    {{--  <hr> --}}     
        <body>
           
                               
             <div class="row text-center">
                    <p align="center"><i><strong>REPORTE DE USUARIOS REGISTRADOS EN EL SISTEMA<strong></i></p>
                 </div>         
             </div>
             <hr>
            
            <table id="emp" class="table table-striped" style="width:100%" >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>nombre</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usr)
                        <tr>
                            <td>{{$usr->id}}</td>
                            <td>{{$usr->name}}</td>
                            <td>{{$usr->email}}</td>
                        </tr>  
                    @endforeach
                </tbody>

            </table>

        </body>
        
    </html> 
























    {{--  <div class="row">
         <div class="col-xs-10">
             <h1 class="h6"><?php echo $remitente ?></h1>
             <h1 class="h6"><?php echo $web ?></h1>
         </div>
         <div class="col-xs-2 text-center">
             <strong>Fecha</strong>
             <br>
             <?php echo $fecha ?>
             <br>
             <strong>Factura No.</strong>
             <br>
             <?php echo $numero ?>
         </div>
     </div>
     <hr>
     <div class="row text-center" style="margin-bottom: 2rem;">
         <div class="col-xs-6">
             <h1 class="h2">Cliente</h1>
             <strong><?php echo $cliente ?></strong>
         </div>
         <div class="col-xs-6">
             <h1 class="h2">Remitente</h1>
             <strong><?php echo $remitente ?></strong>
         </div>
     </div>
     <div class="row">
         <div class="col-xs-12">
             <table class="table table-condensed table-bordered table-striped">
                 <thead>
                 <tr>
                     <th>Descripción</th>
                     <th>Cantidad</th>
                     <th>Precio unitario</th>
                     <th>Total</th>
                 </tr>
                 </thead>
                 <tbody>
                 <?php
                 $subtotal = 0;
                 foreach ($productos as $producto) {
                     $totalProducto = $producto["cantidad"] * $producto["precio"];
                     $subtotal += $totalProducto;
                     ?>
                     <tr>
                         <td><?php echo $producto["descripcion"] ?></td>
                         <td><?php echo number_format($producto["cantidad"], 2) ?></td>
                         <td>$<?php echo number_format($producto["precio"], 2) ?></td>
                         <td>$<?php echo number_format($totalProducto, 2) ?></td>
                     </tr>
                 <?php }
                 $subtotalConDescuento = $subtotal - $descuento;
                 $impuestos = $subtotalConDescuento * ($porcentajeImpuestos / 100);
                 $total = $subtotalConDescuento + $impuestos;
                 ?>
                 </tbody>
                 <tfoot>
                 <tr>
                     <td colspan="3" class="text-right">Subtotal</td>
                     <td>$<?php echo number_format($subtotal, 2) ?></td>
                 </tr>
                 <tr>
                     <td colspan="3" class="text-right">Descuento</td>
                     <td>$<?php echo number_format($descuento, 2) ?></td>
                 </tr>
                 <tr>
                     <td colspan="3" class="text-right">Subtotal con descuento</td>
                     <td>$<?php echo number_format($subtotalConDescuento, 2) ?></td>
                 </tr>
                 <tr>
                     <td colspan="3" class="text-right">Impuestos</td>
                     <td>$<?php echo number_format($impuestos, 2) ?></td>
                 </tr>
                 <tr>
                     <td colspan="3" class="text-right">
                         <h4>Total</h4></td>
                     <td>
                         <h4>$<?php echo number_format($total, 2) ?></h4>
                     </td>
                 </tr>
                 </tfoot>
             </table>
         </div>
     </div>
     <div class="row">
         <div class="col-xs-12 text-center">
             <p class="h5"><?php echo $mensajePie ?></p>
         </div>
     </div>
 </div>
 </body>
 </html> --}}



































































{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>

    <style>
        #emp{
            font-family:Arial,Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%
        }
        #emp td,#emp th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #emp tr:nth-child(even){
            background-color: #acacac7c;
        }
        #emp th{
            padding-top: 12px;
            padding-botton: 12px;
            text-align: left;
            background-color:  #2d00f7;
            color: #fff;
        }
        /* rel="stylesheet" href="/css/admin_custom.css";
        href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet"; */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center"><strong>Listado de Usuarios</strong></h2>
        <div id="bar-chart"></div>
    </div>
    <table id="emp" class="table table-striped" style="width:100%" >
        <thead>
            <tr>
                 <th>ID</th>
                 <th>nombre</th>
                 <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usr)
                <tr>
                    <td>{{$usr->id}}</td>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->email}}</td>
                 </tr>  
            @endforeach
        </tbody>

    </table>

</body>
</html> --}}

{{-- @extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Listado de Usuarios</h1>
@stop

@section('content')
   <a href="usuarios/create" class="btn btn-primary mb-3">Agregar Usuario</a>

<table id="usuarios" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            
            
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
    $('#usuarios').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop --}}
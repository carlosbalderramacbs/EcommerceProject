<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reabastecimiento</title>

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
    <table id="emp" class="table table-striped" style="width:100%" >
        <thead>
            <tr>
                 <th>ID</th>
                 <th>Producto</th>
                 <th>Proveedor</th>
                 <th>Email</th>
                 <th>Telefono</th>

            </tr>
        </thead>
        <tbody>
            
                <tr>
                    <td>1</td>
                    <td>{{$product->find($id=1)->name}}</td>
                    <td>{{$depositos->find($id=2)->nombre}}</td>
                    <td>{{$depositos->find($id=2)->email}}</td>
                    <td>{{$depositos->find($id=2)->telf}}</td>
                    
                 </tr>  
            
        </tbody>

    </table>

</body>
</html>
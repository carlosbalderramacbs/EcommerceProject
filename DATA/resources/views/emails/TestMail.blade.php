{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TEST MAIl</title>
</head>
<body> --}}
    {{-- <h1>{{$details}}</h1>
    <p>{{$details}}</p> --}}
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
            
            {{-- <div class="col-xs-4">
                <img src="{{ asset('images/julios.png') }}" alt="Logotipo" align="right" class="right" style="width: 150px; height: 150px;"> 
               </div> --}}             
               <div class="row text-center" style="margin-bottom: 2rem;">
                   <i align="right">Ferreteria Julio's </i><br>
                   <i align="right">Direccion: Calle Junin #1602. esq sucre </i><br>
                   <i align="right">Telefono: 4060729- 6507521 </i><br>
               </div>
        </div>               
        
       {{--  <hr> --}}     
           <body>
              
                                  
                <div class="row text-center">
                       <p align="center" style="width:80%"><i><strong>RECIBO DE ORDEN DE COMPRA<strong></i></p>
                    </div>         
                </div>
                <hr style="width:80%">

                <p> Estimado usuario, usted esta recibiendo este mensaje como comprobante de que su pago fue exitoso, a continuacion:</p>
                <p> se detallan los resultados de su compra, Con el cual podra pasar recoger sus productos desde la ferreteria </p>
                <p> Gracias por su preferencia </p>
                <table id="emp" class="table table-striped" style="width:80%" >
    

    {{-- <table id="emp" class="table table-striped" style="width:100%" > --}}
{{--     <table class="table">
 --}}            <thead {{-- class="thead-dark" --}}>
        {{-- <thead> --}}
            <tr>
                 <th>ID</th>
                 <th>Producto</th>
                 <th>Cantidad</th>
                 <th>Precio c/u</th>
                 <th>Total</th>
                 {{-- <th>Cantidad</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach (Cart::instance('cart')->content() as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->qty}}</td>
                    <td>Bs.{{$item->price}}</td>
                    <td>Bs.{{$item->price * $item->qty}}</td>                    
                    {{-- <td>{{$item->quantity}}</td> --}}
                 </tr>  
            @endforeach
        </tbody>

    </table>
    {{-- @foreach (Cart::instance('cart')->content() as $item)
    
    <td>{{$item->id}}</td>
    <td>{{$item->name}}</td>
    <td>{{$item->qty}}</td>
        
    @endforeach --}}
    {{-- <p> $a </p> --}}
    

</body>
</html>

{{-- <div>
    <style>
        nav svg{
        height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style>
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3> DETALLES DEL PEDIDO</h4>
                            </div>
                        </div> 
                        <div class="panel-body">
                            <div class="wrap-iten-in-cart">                            
                                
                                <h3 class="box-title">Lista de productos</h3>
                                <ul class="products-cart">                    
                                    @foreach ($order->orderItems as $item)                                                                
                                        <li class="pr-cart-item">
                                            <div class="product-image">
                                                <figure><img src="{{asset('assets/images/products')}}/{{$item->product->image}}" alt="{{$item->product->name}}"></figure>
                                            </div>
                                            <div class="product-name">
                                                <a class="link-to-product" href="{{route('product.details',['slug'=>$item->product->slug])}}">{{$item->product->name}}</a>                                                </div>
                                            <div class="price-field produtc-price"><p class="price">Bs.{{$item->price}}</p></div>
                                            <div class="quantity">
                                                <h5> {{$item->quantity}}</h5>
                                            </div>
                                            <div class="price-field sub-total"><p class="price">Bs.{{$item->price * $item->quantity}}</p></div>                                                                
                                        </li>                
                                    @endforeach                                                   
                                </ul>               
                            </div>                             
                            <div class="summary">
                                <div class="order-summary">
                                    <h4 class="box-title">RESUMEN DEL PEDIDO</h4>
                                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">Bs.{{$order->subtotal}}</b></p>
                                        <p class="summary-info"><span class="title">Total</span><b class="index">Bs.{{$order->total}}</b></p>                                    
                                </div>
                            </div>                            
                        </div>
                        
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="box-title">DETALLES DE FACTURACION  </h3>                           
                                    </div>
                                </div>      
                                <div class="panel-body">
                                    <table class="table">
                                        <tr>
                                            <th>Nombre: </th>
                                            <td>{{$order->firstname}}</td>
                                            <th>Apellido: </th>
                                            <td>{{$order->firstname}}</td>
                                        </tr>
                                        <tr>
                                            
                                            <th>Celular </th>
                                            <td>{{$order->mobile}}</td>
                                            <th>Email: </th>
                                            <td>{{$order->email}}</td>
                                        </tr>
                                        <tr>
                                            <th>Direccion: </th>
                                            <td>{{$order->line1}}</td>
                                            <th>Departamento: </th>
                                            <td>{{$order->city}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>                      
                        </div>                     
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
</div> --}}
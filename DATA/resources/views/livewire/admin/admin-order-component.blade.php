
<div>
    <style>
        nav svg{
        height: 10px;
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
                        <div class = "row">
                            <div class="col-md-6">
                               <h4>DETALLE DE VENTAS</h4>
                            </div>
                            <div class="col-md-6">
                                {{-- <a href="" class="btn btn-primary mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a> --}}
                                {{-- <a href="{{route('admin.addproduct')}}" class="btn btn-success pull-right">Agregar Producto </a> --}}
                                
                            </div>
                        </div>
                        <div class="panel-body">
                            @if(Session::has('order_message'))
                                <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                            @endif 
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Precio Bs.</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Departamento</th>  
                                        <th scope="col">Estado</th>                                
                                        <th scope="col">Fecha de Pedido</th> 
                                        <th colspan="2" class="text-center">Acciones</th>
                                    </tr>
                                </thead>                                
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->subtotal}}</td>
                                        <td>{{$order->total}}</td>
                                        <td>{{$order->firstname}}</td>
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        <td>{{$order->email}}</td>
                                        <td>{{$order->city}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        
                                        <td>
                                            <a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Detalles</td>
                                            
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown"> Estado
                                                    <span class="caret"></span> </button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'Entregado')">Entregado</a></li>
                                                        <li><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'Pagado')">Pagado</a></li>
                                                    </ul>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$orders->links()}}
                        </div>
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>




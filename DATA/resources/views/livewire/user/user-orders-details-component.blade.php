<div>
    {{-- <style>
        nav svg{
        height: 20px;
        }
        nav .hidden{
            display: block !important;
        }
    </style> --}}
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <h3> DETALLES DEL PEDIDO</h4>
                            </div>
                            <div class="col-md-6">
{{--                                 <a href="/userorderdetail-pdf" class="btn btn-primary mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
 --}}                                <a href="{{route('user.orders')}}" class="btn btn-success pull-right"> MIS PEDIDOS </a>
                                
                            </div>
                        </div>                      
                    </div> 
                    <div class="panel-body">
                            <div class="wrap-iten-in-cart">                            
                                
                                <h3 class="box-title">Lista de productos</h3>
                                <ul class="products-cart">   
                                   {{--  @php
                                        $a= $order->orderItems;
                                        dd($a);
                                    @endphp --}}
                                    
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
                                    <p class="summary-info"><span class="title">ID del pedido</span><b class="index">Orden Nº{{$order->id}}</b></p>
                                        <p class="summary-info"><span class="title">Estado</span><b class="index">{{$order->status}} ,en fecha {{$order->updated_at}}</b></p>
                                        <p class="summary-info"><span class="title">Subtotal</span><b class="index">Bs.{{$order->subtotal}}</b></p>
                                        <p class="summary-info"><span class="title">Total</span><b class="index">$.{{$order->total}}</b></p>                                    
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
                                  {{--   @else 
                                    @endif --}}
                                </div>
                            </div>                      
                        </div>                     
                    </div>                    
                </div>
            </div>
        </div>        
    </div>
</div>

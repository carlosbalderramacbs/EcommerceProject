
<div>
    <style>
        nav svg{
        height: 10px;
        }
        nav .hidden{
            display: block !important;
            /* color: ; */
        }
       
    </style>
    <div class ="container" style="padding:30px 0;">
        <div class = "row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class = "row">
                            <div class="col-md-6">
                                <h4> LISTA DE PRODUCTOS </h4>
                            </div>
                            <div class="col-md-6">
                                <a href="/downloadproduct-pdf" class="btn btn-info mb-3 pull-right" style="margin-left:10px;">Exportar PDF</a>
                                <a href="{{route('admin.addproduct')}}" class="btn btn-primary pull-right">Agregar Producto </a>
                                
                            </div>
                    </div>
                </div>                      
                            <div class="panel-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                                @endif 
                                <div class="col-md-4 pull-right">
                                    <input type="text" class="form-control  " style="margin-left:10px;" placeholder="Buscar..." wire:model="searchTerm" />
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Imagen</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Medida</th>
                                            <th scope="col">Precio</th>
                                            <th scope="col">Precio en Oferta</th>
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
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->unity}}</td>
                                            <td>{{$product->regular_price}}</td>
                                            <td>{{$product->sale_price}}</td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <form action="{{ route ('productos.destroy',$product->id)}}" method="POST">
                                                <a href="{{route('admin.editproduct',['product_slug'=>$product->slug])}}"><i class="fa fa-edit fa-2x text-info"></i></a>
                                                {{-- <a href="#" onclick="confirm('Estas seguro que deseas eliminar este producto?') || event.stopImmediatePropagation()" wire:click.prevent="deleteProduct({{$product->id}})"style="margin-left:10px;"><i class="fa fa-times fa-2x text-danger"></i></a>                                       --}}

                                                @if($product->quantity<5)                                                
                                                <a href="{{route('admin.providers')}}" {{-- wire:click.prevent="reabastProduct({{$product->id}})" --}}><i class="fa fa-exclamation-triangle fa-2x text-danger "></i></a>                                               <div class="alert alert-danger" role="alert">Existen Productos Agotandose. Contacte con su proveedor a la Brevedad Posible </div>
                                                {{-- {{$product->id}} {{$product->name}} --}}
                                                @endif 

                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>    
                                </table>
                                {{$products->links()}}
                            {{-- </div> --}}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>








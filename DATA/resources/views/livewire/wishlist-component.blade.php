<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Catalogo De Productos</span></li>
            </ul>
        </div>

        <style>
            .product-wish{
                position: absolute;
                top:10px;
                left: 0px;
                z-index: 99;
                right: 30px; 
                text-align: right;
                padding-top: 0;
            }
            .product-wish .fa{
                color: #cbcbcb;
                font-size: 32px;
            }
            .product-wish .fa:hover{
                color : #ff7007;
            }
            .fill-shopping-cart{
                color: #ff7007 !important;
            }
            /* .fill-heart{
                color: #ff7007 !important;
            } */

        </style>
        <div class="row">
            @if(Cart::instance('wishlist')->content()->count()>0)
                <ul class="product-list grid-products equal-container">

                    @foreach(Cart::instance('wishlist')->content() as $item)   
                        <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                            <div class="product product-style-3 equal-elem ">
                                <div class="product-thumnail">
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                        <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}"  alt="{{$item->model->name}}"></figure>
                                    </a>
                                </div>
                                <div class="product-info"> 
                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="product-name"><span>{{$item->model->name}}</span></a>
                                    <div class="wrap-price"><span class="product-price">Bs.{{$item->model->regular_price}}</span></div>



                                    <a href="{{route('product.details',['slug'=>$item->model->slug])}}" class="btn add-to-cart" >Detalles del Producto</a> {{-- llamando al metodo store para el carrito de compras x --}}
                                <div class="product-wish">

                                    <a href="#" wire:click.prevent="removeFromWishlist({{$item->model->id}})"><i class="fa fa-shopping-cart fill-shopping-cart"></i></a>
                                    


                                {{--  @if($item->model->sale_price>0 && $sale->status ==1 && $sale->sale_date>Carbon\Carbon::now()) --}}
                        {{--         <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Añadir al carrito</a>                            
                                @else
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Añadir al carrito</a>                            
                                @endif --}}
                                    {{-- <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Añadir al carrito</a> {{-- llamando al metodo store para el carrito de compras x --}} 
                                    {{-- <div class="product-wish"> --}}
                                        
                                </div>
                            </div>
                        </li>
                    @endforeach                         
                </ul>
            @else
                <h4> No existen productos en la lista </h4>
            @endif
        </div>

    </div>
</main>
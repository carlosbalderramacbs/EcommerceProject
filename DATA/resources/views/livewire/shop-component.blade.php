<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Catalogo De Productos</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="{{asset('assets/images/fondo3.jpg')}}" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Catalogo de Productos</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby ">
                            <select name="orderby" class="use-chosen" wire:model="sorting" >
                                <option value="default" selected="selected">Por defecto</option>
                                <option value="date">Recientemente añadidos</option>
                                <option value="price">Ordenar por precio: Menor a Mayor</option>
                                <option value="price-desc">Ordenar por precio: Mayor a Menor</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                <option value="12" selected="selected">12 por pagina</option>
                                <option value="16">16 por pagina</option>
                                <option value="20">20 por pagina</option>                                
                            </select>
                        </div>
                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Cuadricula</a>
                            {{-- <a href="#" class="list-mode display-mode"><i class="fa fa-th-list"></i>Lista</a> --}}
                        </div>

                    </div>

                </div><!--end wrap shop control-->


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

                    <ul class="product-list grid-products equal-container">

                        @php
                            $witems = Cart::instance('wishlist')->content()->pluck('id');
                            $citems = Cart::instance('cart')->content()->pluck('id');
                        @endphp
                        @foreach($products as $product) 
                            @if($product->quantity > 0 && $product->stock_status =="disponible")  
                                
                            
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" title="{{$product->name}}">
                                            <figure><img src="{{asset('assets/images/products')}}/{{$product->image}}"  alt="{{$product->name}}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info"> 
                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" class="product-name"><span>{{$product->name}}</span></a>
                                        @if($sale->status ==1 && $sale->sale_date>Carbon\Carbon::now() && $product->sale_price>0)
                                        {{-- MUY IMPORTANTE --}}
                                        <div class="wrap-price"><span class="product-price">Bs.{{$product->sale_price}}</span></div>
                                        @else
                                        <div class="wrap-price"><span class="product-price">Bs.{{$product->regular_price}}</span></div>
                                        @endif


                                        <a href="{{route('product.details',['slug'=>$product->slug])}}" class="btn add-to-cart" >Detalles del Producto</a> {{-- llamando al metodo store para el carrito de compras x --}}
                                    <div class="product-wish">
                                        {{-- @if($witems->contains($product->id))
                                            <a href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fa fa-shopping-cart fill-shopping-cart"></i></a> --}}
                                        @if($citems->contains($product->id))
                                            <a href="#" wire:click.prevent="removeFromCart({{$product->id}})"><i class="fa fa-shopping-cart fill-shopping-cart"></i></a>        
                                        @else
                                            @if($product->sale_price>0 && $sale->status ==1 && $sale->sale_date>Carbon\Carbon::now())
                                                <a href="#" wire:click.prevent="storeWR({{$product->id}},'{{$product->name}}',{{$product->sale_price}})"><i class="fa fa-shopping-cart"></i></a> {{-- llamando al metodo store para el carrito de compras x --}} 
                                            @else
                                            <a href="#" wire:click.prevent="storeWR({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-shopping-cart"></i></a>                                                                        
                                            @endif
                                        {{-- <a href="#" wire:click.prevent="addToWlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})"><i class="fa fa-shopping-cart"></i></a> {{-- llamando al metodo store para el carrito de compras x --}}  
                                        @endif
                                        
                                       {{--  <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Añadir al carrito</a>                            
                                        @else
                                        <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Añadir al carrito</a>                            
                                        @endif --}}


                                       {{--  @if($product->sale_price>0 && $sale->status ==1 && $sale->sale_date>Carbon\Carbon::now()) --}}
                            {{--         <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->sale_price}})">Añadir al carrito</a>                            
                                    @else
                                    <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Añadir al carrito</a>                            
                                    @endif --}}
                                        {{-- <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})">Añadir al carrito</a> {{-- llamando al metodo store para el carrito de compras x --}} 


                                        {{-- <div class="product-wish"> --}}
                                            
                                    </div>
                                </div>
                            </li>
                            @else
                            @endif
                        @endforeach                         
                    </ul>
                </div>

                <div class="wrap-pagination-info">                   
                    {{$products->links()}}                      
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">Todas las categorias</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li class="category-item">
                                 <a href="{{route('product.category',['category_slug'=>$category->slug])}}" class="cate-link">{{$category->name}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->
            </div><!--end sitebar-->
        </div><!--end row-->
    </div><!--end container-->
</main>
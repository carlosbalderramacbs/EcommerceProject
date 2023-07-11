<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Carrito</span></li>
            </ul>
        </div>

        <form method="POST">
            <div class=" main-content-area">
            @if (Cart::instance('cart')->count()>0)
            <div class="wrap-iten-in-cart">
                @if (Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Exito </strong>{{Session::get('success_message')}}
                </div>
                @endif 
                {{-- @if(Cart::instance('cart')->count()>0) --}}
                    <h3 class="box-title">Lista de productos</h3>
                    <ul class="products-cart">
                    
                    @php
                        $witems = Cart::instance('wishlist')->content()->pluck('id');
                        $citems = Cart::instance('cart')->content()->pluck('id');


                        /* $a = Cart::instance('cart')->content()->toArray();
                        dd($a); */
                        /* $qwitems = Cart::instance('cart')->content()->get(['id', 'name','qty']);
                        dd($qwitems); */

                        
                    @endphp
                    
                        @foreach (Cart::instance('cart')->content() as $item)                                     
                    
                        <li class="pr-cart-item">
                            <div class="product-image">
                                <figure><img src="{{asset('assets/images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                            </div>
                            <div class="product-name">
                                <a class="link-to-product" href="{{route('product.details',['slug'=>$item->model->slug])}}">{{$item->model->name}}</a>
                            </div>                       
                           
                            <div class="quantity ">
                                <div class="quantity-input">
                                    
                                    <input type="number" id="name" name="name"  readonly value="{{$item->qty}}"  max="{{$item->model->quantity}}" min="1" pattern="^[0-9]+"  >
                                        
                                       {{--  @if ($errors->has('name'))
                                            <span class="invalid feedback"role="alert">
                                            <strong>{{ $errors->first('name') }}.</strong>
                                        </span>
                                        @endif   --}}                                   
                                        <a class="btn btn-increase" href="#" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" wire:model="cantidad"></a>
                                        <a class="btn btn-reduce" href="#" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')"></a>                                                                                
                                    </div>  
                                    @error('cantidad') <span class="text-danger">{{$message}}</span> @enderror

                                </div>
                               {{--  @if($item->qty > $item->model->quantity )
                                        {   
                                            <span class="invalid feedback"role="alert">
                                            <strong>{{ $errors->first('name') }}.</strong>
                                        }
                                @endif
                                @error('name')
                                    <br>
                                    <small>*{{$message}}<small>
                                    <br>
                                @enderror --}}
                            
                            <div class="price-field sub-total"><p class="price">Bs.{{$item->subtotal}}</p></div>
                            <div class="delete">
                                <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="btn btn-delete" title="">
                                    <span>Eliminar del carrito</span>
                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                </a>
                            </div>                       
                        </li>  

                    @endforeach                 											
                    </ul>
            </div>
            <div class="summary">
                <div class="order-summary">
                    <h4 class="title-box">Resumen del pedido</h4>                    
                    <p class="summary-info"><span class="title">Subtotal</span><b class="index">Bs.{{Cart::instance('cart')->subtotal()}}</b></p>
                    

                    
                    @php
                        $num = Cart::instance('cart')->total(); 
                        $totalconvert = str_replace(',', '', $num);
                      
                    @endphp
                    <p class="summary-info total-info "><span class="title">Total</span><b class="index">$.{{round((float)($totalconvert/6.96),2)}}</b></p>
                   
                </div>
                
                <div class="checkout-info">                     
                    <a class="btn btn-checkout" href="#" wire:click.prevent="checkout" wire:model="cantidad" type="submit">Proceder a Pagar </a>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" id="paypal-button-container"></div>                  
                </div>
            </form>
                <div class="update-clear">
                    <a class="btn btn-clear" href="#" wire:click.prevent="destroyAll()" >Vaciar Carrito</a>
                    <a class="btn btn-update" href="/shop">Seguir Comprando</a>
                </div>
            </div>
            
            @else 
                <div class="text-center" style="padding:30px 0;">
                    <h1> Carrito Vacio </h1>
                    <p>Agrega algunos productos y regresa </p>
                    <a href="/shop" class="btn btn-success"> Añadir Productos</a>
                </div> 
            @endif
            
            
        </div><!--end main content area-->
    </div><!--end container-->

</main>

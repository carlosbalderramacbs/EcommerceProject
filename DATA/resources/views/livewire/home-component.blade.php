<main id="main">
    <div class="container">
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="{{asset('assets/images/fondo2.jpg')}}" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        {{-- <h2 class="f-title">Kid Smart <b>Watches</b></h2> --}}
                        {{-- <span class="subtitle">Compra todos tus productos Smart por internet.xd</span> --}}
                        {{-- <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a> --}}
                    </div>
                </div>
                    <div class="item-slide">
                        <img src="{{asset('assets/images/fondo2.jpg')}}" alt="" class="img-slide">
                        <div class="slide-info slide-1">
                            <h2 class="f-title">Ventas <b>ONLINE</b></h2>
                            <span class="subtitle">Compra todos tus productos de ferreteria por internet.</span>
                            <p class="sale-info"> <span class="price"></span></p>
                            <a href="/shop" class="btn-link">Compra ahora!</a>
                        </div>
                    </div>                                          
                </div>


                
                               
            </div>
        </div>

        @if($sproducts->count()>0 && $sale->status ==1 && $sale->sale_date>Carbon\Carbon::now())
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">En Oferta</h3>
                    <div class="wrap-countdown mercado-countdown" data-expire="{{Carbon\Carbon::parse($sale->sale_date)->format('Y/m/d H:m:s')}}"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                        @foreach ($sproducts as $sproduct)                         
                            
                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}" title="{{$sproduct->name}}">
                                    <figure><img src="{{asset('assets/images/products')}}/{{$sproduct->image}}" width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">Oferta</span>
                                </div>                                
                            </div>
                            <div class="product-info">
                                <a href="{{route('product.details',['slug'=>$sproduct->slug])}}" class="product-name"><span>{{$sproduct->name}}</span></a>
                                <div class="wrap-price"><ins><p class="product-price">Bs.{{$sproduct->sale_price}}</p></ins><del><p class="product-price">Bs.{{$sproduct->regular_price}}</p></del></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

        <!--BANNER-->
        {{-- <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-1.jpg')}}" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{asset('assets/images/home-1-banner-2.jpg')}}" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div> --}}
                        
                    </div>
                </div>
            </div>
        </div>	
    </div>
</main>
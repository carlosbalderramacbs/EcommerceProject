<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Julio's</title>	
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/css/bootstrap-datetimepicker.min.css" integrity="sha512-ve3HkfDj0yuNfwMyOMoyva1kd6FO3N07Ypbz4YEOnGLOScyYu719khU1yGdX9iUR4oyVT6p0jfcRbVWefwRmvg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/color-01.css') }}">
	<link rel="stylesheet" href="sweetalert2.min.css">




	


    @livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Telefono: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Telefono 4444444 CBBA</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
								
								{{-- <li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="assets/images/lang-en.png" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="assets/images/lang-hun.png" alt="lang-hun"></span>Hungary</a></li>
										<li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="assets/images/lang-ger.png" alt="lang-ger" ></span>German</a></li>
										<li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="assets/images/lang-fra.png" alt="lang-fre"></span>French</a></li>
										<li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="assets/images/lang-can.png" alt="lang-can"></span>Canada</a></li>
									</ul>
								</li> --}}
								{{-- <li class="menu-item menu-item-has-children parent" >
									<a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Pound (GBP)" href="#">Pound (GBP)</a>
										</li>
										<li class="menu-item" >
											<a title="Euro (EUR)" href="#">Euro (EUR)</a>
										</li>
										<li class="menu-item" >
											<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
									</ul>
								</li> --}}

								@if(Route::has('login'))
								@auth
									@if(Auth::user()->utype=='ADM')
										<li class="menu-item menu-item-has-children parent" >
											<a title="Perfil" href="#">Mi cuenta ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="submenu curency" >
												<li class="menu-item" >
													<a title="Panel" href="{{route('admin.dashboard')}}">Panel Administrador</a>
												</li>
												<li class="menu-item" >
													<a title="Users" href="{{route('admin.users')}}">Usuarios</a>
												</li>
												<li class="menu-item" >
													<a title="Products" href="{{route('admin.products')}}">Productos</a>
												</li>
												<li class="menu-item" >
													<a title="Categories" href="{{route('admin.categories')}}">Categorias</a>
												</li>
												<li class="menu-item" >
													<a title="Panel" href="{{route('admin.providers')}}">Proveedores</a>
												</li>
												<li class="menu-item" >
													<a title="Ofertas" href="{{route('admin.sale')}}">Ofertas</a>
												</li>
												<li class="menu-item" >
													<a title="ventas" href="{{route('admin.orders')}}">Ventas</a>
												</li>
												

												
												<li class="menu-item">
													<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
												</li>
												<form id="logout-form" method="POST" action="{{route('logout')}}">
													@csrf													
												</form>
											</ul>
										</li>
									@else
										<li class="menu-item menu-item-has-children parent" >
											<a title="Perfil" href="#">Mi cuenta ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="submenu curency" >
												<li class="menu-item" >
													<a title="Panel" href="{{route('profile.show')}}">Perfil usuario</a>
												</li>
												<li class="menu-item" >
													<a title="Panel" href="{{route('user.orders')}}">Historial de pedidos</a>
												</li>
												
												<li class="menu-item">
													<a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesion</a>
												</li>
												<form id="logout-form" method="POST" action="{{route('logout')}}">
													@csrf
													
												</form>
											</ul>
										</li>
									@endif
								@else
									<li class="menu-item" ><a title="Iniciar sesion o registrarse" href="{{route('login')}}">Iniciar Sesion</a></li>
									<li class="menu-item" ><a title="Iniciar sesion o registrarse" href="{{route('register')}}">Registrarse</a></li>	
								@endif
								@endif
							</ul>
						</div>
					</div>
				</div>
				
				

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="" class="link-to-home"><img src="{{asset('assets/images/julios.png')}}" alt="mercado"></a>
						</div>

						@livewire('header-search-component')

						<div class="wrap-icon right-section">
							
							<div class="wrap-icon-section minicart">
								<a href="/cart" class="link-direction">
									<i class="fa fa-shopping-basket" aria-hidden="true"></i>
									{{-- <span class="title">Carrito</span> --}}
									{{-- <div class="left-info">
										@if(Cart::instance('cart')->count()>0)
										<span class="index">{{Cart::instance('cart')->count()}}Productos</span>
										@endif 
										<span class="title">Carrito</span>
									</div> --}}
								</a>
							</div>
			
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					
					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Area de submenus" >
								<li class="menu-item home-icon">
									<a href="/" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="/" class="link-term mercado-item-title">Acerca de Nosotros</a>
								</li>
								<li class="menu-item">
									<a href="/shop" class="link-term mercado-item-title">Productos</a>
								</li>
								<li class="menu-item">
									<a href="/cart" class="link-term mercado-item-title">Carrito</a>
								</li>
								<li class="menu-item">
									<a href="/checkout" class="link-term mercado-item-title">Pagar</a>
								</li>
																							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
    {{$slot}}
	<footer id="footer">
		<div class="wrap-footer-content footer-style-1">

			<div class="wrap-function-info">
				<div class="container">
					<ul>
						{{-- <li class="fc-info-item">
							<i class="fa fa-truck" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Free Shipping</h4>
								<p class="fc-desc">Free On Oder Over $99</p>
							</div>

						</li> --}}
						<li class="fc-info-item">
							<i class="fa fa-check" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Seguridad</h4>
								<p class="fc-desc">Seguridad ante todo.</p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-credit-card-alt" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Metodos de Pago Seguros</h4>
								<p class="fc-desc"></p>
							</div>

						</li>
						<li class="fc-info-item">
							<i class="fa fa-android" aria-hidden="true"></i>
							<div class="wrap-left-info">
								<h4 class="fc-name">Accede desde tu celular</h4>
								<p class="fc-desc"></p>
							</div>

						</li>
					</ul>
				</div>
			</div>
			<!--End function info-->

			

			<div class="main-footer-content">

				<div class="container">

					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								<h3 class="item-header">Detalles de contacto</h3>
								<div class="item-content">
									<div class="wrap-contact-detail">
										<ul>
											<li>
												<i class="fa fa-map-marker" aria-hidden="true"></i>
												<p class="contact-txt">Calle Junin #1026. esq Pacheco</p>
											</li>
											<li>
												<i class="fa fa-phone" aria-hidden="true"></i>
												<p class="contact-txt">4444444 Ferreteria Julio's</p>
											</li>
											<li>
												<i class="fa fa-envelope" aria-hidden="true"></i>
												<p class="contact-txt">juliosrrhh@gmail.com</p>
											</li>											
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

							<div class="wrap-footer-item">
								<h3 class="item-header">Nuestras Lineas de Contacto</h3>
								<div class="item-content">
									<div class="wrap-hotline-footer">
										<span class="desc">Ponte en contacto</span>
										<b class="phone-number">4444444 - (+591) 60606070	</b>
									</div>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
							<div class="row">
								<div class="wrap-footer-item twin-item">
									
									<div class="item-content">
										<h3 class="item-header">Usamos los siguientes metodos de pago:</h3>
								<div class="item-content">
									<div class="wrap-list-item wrap-gallery">
										<img src="{{asset('assets/images/payment.png')}}" style="max-width: 260px;">
									</div>
								</div>
									</div>
								</div>
								{{-- <div class="wrap-footer-item twin-item">
									<h3 class="item-header">Redes sociales</h3>
									<div class="item-content">
										<div class="wrap-list-item social-network">
											<ul>
												
												<li><a href="#" class="link-to-item" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												</ul>
										</div>
									</div>
								</div> --}}
							</div>
						</div>

					</div>
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
					<div class="row">

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
							<div class="wrap-footer-item">
								
							</div>
						</div>

						
					</div>
					
				</div>
		</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="{{ asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.flexslider.js') }}"></script>   
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
	<script src="{{ asset('assets/js/functions.js') }}"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-r/mHP22LKVhxWFlvCpzqMUT4dWScZc6WRhBMVUQh+SdofvvM1BS1Hdcy94XVOod7QqQMRjLQn5w/AQOfXTPvVA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   

	<script src="https://cdn.jsdelivr.net/npm/chart.js@3.3.2/dist/chart.min.js" integrity="sha256-qoN08nWXsFH+S9CtIq99e5yzYHioRHtNB9t2qy1MSmc=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.0.0/js/bootstrap-datetimepicker.min.js" integrity="sha512-vyfGs1rWdTeCZUgZCm8h56zm+7Yx86WcJUv3WDktb01lv6cBE5lHRsmu4iJfWuRj48nu0woof04lKwbS5rmdjA==" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

{{-- <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script> --}}

    @livewireScripts

	@stack('js')
	{{-- <script>
		asd
	</scrip> --}}
</body>
</html>
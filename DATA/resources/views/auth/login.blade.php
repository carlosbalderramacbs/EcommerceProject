 <x-guest-layout>
    <main id="main" class="main-site left-sidebar">

		<div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">Inicio</a></li>
					<li class="item-link"><span>INICIAR SESION</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">

                                 <x-jet-validation-errors class="mb-4" />  {{-- validaciones xd --}}

								<form name="frm-login" method="POST" action="{{route('login')}}">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Inicia sesion en tu cuenta</h3>										
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-uname">Email:</label>
										<input type="email" id="frm-login-uname" name="email" placeholder="Ingresa tu email":value="old('email)" required autofocus>
									</fieldset>
									<fieldset class="wrap-input">
										<label for="frm-login-pass">Password:</label>
										<input type="password" id="frm-login-pass" name="password" placeholder="************" required autocomplete="current-password">
									</fieldset>
									
									<fieldset class="wrap-input">
										<label class="remember-field">
											<input class="frm-input " name="remember" id="rememberme" value="forever" type="checkbox"><span>Recuerdame</span>
										</label>
										<a class="link-function left-position" href="{{route('password.request')}}" title="Olvidaste tu contraseña?">Olvidaste tu contraseña?</a>
									</fieldset>
									<input type="submit" class="btn btn-submit" value="Iniciar Sesion" name="submit">
								</form>
							</div>												
						</div>
					</div><!--end main products area-->		
				</div>
			</div><!--end row-->

		</div><!--end container-->

	</main>
 </x-guest-layout>
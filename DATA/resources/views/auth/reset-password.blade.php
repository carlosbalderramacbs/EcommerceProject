    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                <x-jet-authentication-card-logo />
            </x-slot>
            <div class="container">

                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="/" class="link">Inicio</a></li>
                        <li class="item-link"><span>Restablecer contraseña</span></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-4">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">						
                                <div class="login-form form-item form-stl">
            
                            <x-jet-validation-errors class="mb-4" />

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <fieldset class="wrap-title">
										<h3 class="form-title">Recupera el acceso a tu cuenta</h3>										
									</fieldset>
                                    <div class="block">
                                        <x-jet-label for="email" value="{{ __('Email:') }}" />
                                        <x-jet-input id="email" readonly="readonly" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Contraseña:') }}" />
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña:') }}" />
                                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="btn btn-success">
                                            {{ __('Restablecer contraseña') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>												
						</div>
					</div><!--end main products area-->		
				</div>

             <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>   
			</div><!--end row-->

                 
		</div><!--end container-->  
        </x-jet-authentication-card>
    </x-guest-layout>

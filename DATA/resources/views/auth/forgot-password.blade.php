<x-guest-layout>
    <x-jet-authentication-card>     


        <div class="container">

			<div class="wrap-breadcrumb">
				<ul>
					<li class="item-link"><a href="/" class="link">Inicio</a></li>
					<li class="item-link"><span>Restablecer contraseña</span></li>
				</ul>
			</div>
			<div class="row">
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
					<div class=" main-content-area">
						<div class="wrap-login-item ">						
							<div class="login-form form-item form-stl">

                                {{--  <x-jet-validation-errors class="mb-4" />  --}} {{-- validaciones xd --}}

                                 <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                                 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


								<form  method="POST" action="{{ route('password.email') }}">
                                    @csrf
									<fieldset class="wrap-title">
										<h3 class="form-title">Recupera el acceso a tu cuenta</h3>										
									</fieldset>
                                    <div class="mb-4 text-sm text-gray-600">
                                        {{ __('Olvidaste tu contraseña? No hay problema. Ingresa tu correo electronico y se te enviara un enlace a tu correo para que puedas restablecer tu contraseña') }}                                        
                                    </div>
                                    {{-- @if (session('status'))
                                    <div class="mb-6 font-medium text-sm text-green-600">
                                       


                                      {{ session('status') }}
                                    </div>
                                    @endif --}}
                                    @if (Session::has('status'))
                                        <script>
                                            swal.fire({
                                                        position: 'center',
                                                        icon: 'success',
                                                        title: '{{ session('status') }}',
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });
                                        </script>
                                    @endif
									
                                        <x-jet-validation-errors class="mb-4" />                           

                                        <div class="block">
                                            <x-jet-label for="email" value="{{ __('Email') }}" />
                                            <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <x-jet-button class="btn btn-success" {{-- wire:click="emit('" --}}>
                                                
                                                {{ __('Enviar restablecimiento de contraseña') }}
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

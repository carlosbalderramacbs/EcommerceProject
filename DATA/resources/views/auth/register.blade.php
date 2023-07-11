<x-guest-layout>
 <main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">Inicio</a></li>
                <li class="item-link"><span>Registrarse</span></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">							
                <div class=" main-content-area">
                    <div class="wrap-login-item ">
                        <div class="register-form form-item ">
                            <x-jet-validation-errors class="mb-4" />
                            <form class="form-stl" action="{{route('register')}}" name="frm-login" method="POST" >
                                @csrf
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Crear una cuenta</h3>
                                    <h4 class="form-subtitle">Informacion Personal</h4>
                                </fieldset>									
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-lname">Nombre *</label>
                                    <input type="text" id="frm-reg-lname" name="name" placeholder="Nombre" :value="name" required autofocus autocomplete="name">
                                </fieldset>
                                <fieldset class="wrap-input">
                                    <label for="frm-reg-email">Correo Electronico*</label>
                                    <input type="email" id="frm-reg-email" name="email" placeholder="Correo electronico" :value="email">
                                </fieldset>
                                {{-- <fieldset class="wrap-functions ">
                                    <label class="remember-field">
                                        <input name="newletter" id="new-letter" value="forever" type="checkbox"><span>Sign Up for Newsletter</span>
                                    </label>
                                </fieldset> --}}
                                <fieldset class="wrap-title">
                                    <h3 class="form-title">Datos de inicio de sesion</h3>
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half left-item ">
                                    <label for="frm-reg-pass">Contraseña *</label>
                                    <input type="password" id="frm-reg-pass" name="password" placeholder="Contraseña"required autocomplete="new-password">
                                </fieldset>
                                <fieldset class="wrap-input item-width-in-half ">
                                    <label for="frm-reg-cfpass">Confirmar Contraseña *</label>
                                    <input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirmar Contraseña" required autocomplete="new-password">
                                </fieldset>
                                <input type="submit" class="btn btn-sign" value="Registrarse" name="register">
                            </form>
                        </div>											
                    </div>
                </div><!--end main products area-->		
            </div>
        </div><!--end row-->

    </div><!--end container-->

</main>
</x-guest-layout>
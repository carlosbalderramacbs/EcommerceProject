<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">INICIO</a></li>
                <li class="item-link"><span>Pagar</span></li>
            </ul>
        </div>
        <div class=" main-content-area">


          <form wire:submit.prevent="placeOrder">


            <div class="row">
              <div class="col-md-12">
                <div class="wrap-address-billing">
                  <h3 class="box-title">Datos de facturacion</h3>
                  <div class="billing-address"></div>
                    <p class="row-in-form">
                        <label for="fname">Nombre<span>*</span></label>
                        <input type="text" name="fname" value="" placeholder="Nombre" wire:model="nombre">
                        @error('nombre') <span class="text-danger">{{$message}}</span> @enderror
                    </p>
                    <p class="row-in-form">
                        <label for="lname">Apellido<span>*</span></label>
                        <input type="text" name="lname" value="" placeholder="Apellido" wire:model="apellido">
                        @error('apellido') <span class="text-danger">{{$message}}</span> @enderror
                    </p>
                    <p class="row-in-form">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="" placeholder="Email" wire:model="email">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </p>
                    <p class="row-in-form">
                        <label for="phone">Numero de celular<span>*</span></label>
                        <input type="number" name="phone" value="" placeholder="Celular" wire:model="telefono">
                        @error('telefono') <span class="text-danger">{{$message}}</span> @enderror
                    </p>
                    <p class="row-in-form">
                        <label for="add">Direccion:</label>
                        <input type="text" name="add" value="" placeholder="Direccion de la calle y #" wire:model="direccion">
                        @error('direccion') <span class="text-danger">{{$message}}</span> @enderror
                    </p>
                    
                    <p class="row-in-form">
                        <label for="city">Departamento<span>*</span></label>
                        <input type="text" name="city" value="" placeholder="Ciudad" wire:model="departamento">
                        @error('departamento') <span class="text-danger">{{$message}}</span> @enderror
                    </p> {{-- Town / City --}}
                    <p class="row-in-form fill-wife">                                             
                    </p>
                  </div>            
                </div>
              </div>
            </div>


          


            <div class="summary summary-checkout">
                <div class="summary-item payment-method">
                    <h4 class="title-box">Metodos de pago</h4>
                    {{-- <p class="summary-info"><span class="title">Check / Money order</span></p>
                    <p class="summary-info"><span class="title">Credit Cart (saved)</span></p> --}}
                    <div class="choose-payment-methods">
                        {{-- <label class="payment-method">
                            <input name="payment-method" id="payment-method-bank" value="bank" type="radio" wire:model="paymentmode">
                            <span>Transferencia Bancaria</span>
                            <span class="payment-desc">Realiza tu pago directamente en nuestra cuenta bancaria. Por favor usa la referencia del pedido como referencia de pago. Tu pedido no será enviado hasta que el importe haya sido recibido en nuestra cuenta. Una Vez realizada tu Transferencia o Depósito Bancario, confirma con una fotografía respondiendo a este correo.</span>
                        </label>
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-visa" value="visa" type="radio" wire:model="paymentmode">
                            <span>Tarjeta de credito</span>
                            
                        </label> --}}
                        <label class="payment-method">
                            <input name="payment-method" id="payment-method-paypal" value="paypal" type="radio" wire:model="modo_de_pago">
                            <span>Paypal</span>
                            <span class="payment-desc">Pagar con PayPal; puedes pagar con tu tarjeta de crédito si no tienes una cuenta de PayPal.</span>
                            {{-- <span class="payment-desc">card if you don't have a paypal account</span> --}}
                        </label>
                        @error('modo_de_pago') <span class="text-danger">{{$message}}</span> @enderror
                        
                    </div>
                    <p class="summary-info grand-total"><span>Precio en BOB.</span> <span class="grand-total-price" ><i style="margin-left:10px;">Bs</i>.{{Cart::instance('cart')->subtotal()}}</span></p>

                    @php
                        $num = Cart::instance('cart')->total(); 
                        $totalconvert = str_replace(',', '', $num);
                       /*  dd($totalconvert);  */
                    @endphp
                    
                    <p class="summary-info grand-total"><span>Precio en SUS.</span> <span class="grand-total-price" ><i style="margin-left:10px;"></i>$.{{round((float)($totalconvert/6.96),2)}}</span></p>
                  
              
                  {{-- <a href="{{url('/paypal/pay')}}" class="btn btn-medium">Realizar el pedido</a> --}}

                  <button type="submit" class="btn btn-medium">Realizar el pedido</button>

                </div>
            </div> 
          </form>                              
        </div><!--end main content area-->
    </div><!--end container-->

</main>














<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use Illuminate\Support\Facades\Config;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\Details;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use Cart;
use App\Models\OrderItem;
use App\Mail\TestMail;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    private $apiContext;

    public function __construct()
    {
        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],
                $payPalConfig['secret']             
            )
        );
        $this->apiContext->setConfig($payPalConfig['settings']);
    }

    // ...

    public function payWithPayPal()   // metodo para procesar el pago.
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');  // usuario q va pagar

        $amount = new Amount();
        $num = Cart::instance('cart')->total();
        $totalconvert = str_replace(',', '', $num);
        $totalconvertido = round((float)($totalconvert/6.96),2);

        $amount->setTotal($totalconvertido);
        /* $amount->setTotal('3.99'); */
        $amount->setCurrency('USD');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        

        $callbackUrl = url('/paypal/status');

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl($callbackUrl)   //ruta sin dinero
            ->setCancelUrl($callbackUrl); //ruta de regreso boton cancelar

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->apiContext);
            return redirect()->away($payment->getApprovalLink());
        } catch (PayPalConnectionException $ex) {   //paypal crea el pago. etc sucess
            echo $ex->getData();
        }
    }

    public function payPalStatus(Request $request)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        //datos recibidos por paypal <-

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect()->route('failed')->with(compact('status'));;            
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);


/* 
        dd($result); */
        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha ralizado correctamente.';
            /* foreach( Cart::instance('cart')->content() as $item) 
            {                 
            }  */
            
            $details=  [
                'title' => 'Correo de julios.store',
                'body' => 'Este es un correo de julios.store para comunicarte que tu pago se realizo exitosamente
                con el Nº de pedido'. Auth::id(),              
               
            ];
            

        /* $order = new Order();
        $order ->user_id= Auth::user()->id;
        
        
        $num = session()->get('checkout')['subtotal']; 
        $totalconvert = str_replace(',', '', $num);
        $totalconvertido = round((float)($totalconvert/6.96),2);

        $order ->subtotal =$totalconvert;
        $order ->discount =session()->get('checkout')['discount'];
        $order ->total =$totalconvertido;


        $order->firstname= $this->nombre;
        $order->lastname= $this->apellido;
        $order->email= $this->email;
        $order->mobile= $this->telefono;
        $order->line1= $this->direccion;
        $order->city= $this->departamento;
      
        $order->save();

        foreach(Cart::instance('cart')->content()as $item){
            $orderItem = new OrderItem();
            $orderItem->product_id=$item->id;
            $orderItem->order_id=$order->id;
            $orderItem->price=$item->price;
            $orderItem->quantity=$item->qty;
            $orderItem->save();
        }

        if($this->modo_de_pago=='cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode= 'cod';
            $transaction->status= 'pendiente';
            $transaction->save();
        }
         */





        Mail::to(Auth::user()->email)->send(new TestMail($details));
        foreach( Cart::instance('cart')->content() as $item) 
        {
            /* @if($item->model->quantity>=1  */
            /* SIREVE  S$item->model->quantity = $item->model->quantity  */
            /*  dd($item->model->quantity); */
                
               /* dd($item->qty); */
               /* dd($item->id); */

                Product::where('id',  $item->id)->decrement('quantity', $item->qty);


                /* product_id = $pro->product_id
                quantity = $pro->quantity
                dd(product_id); */
            }
            
                
            Cart::instance('cart')->destroy();
            session()->forget('checkout');

            return redirect()->route('thankyou')->with(compact('status'));
            /* return redirect('/results')->with(compact('status')); */
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
        return redirect()->route('failed')->with(compact('status'));
        /* return redirect('/results')->with(compact('status')); */
    }
}

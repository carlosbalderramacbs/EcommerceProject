<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Cart;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class CheckoutComponent extends Component
{

    public $firstname;
    public $nombre;
    public $apellido;

    public $lastname;
    public $email;
    public $telefono;
    public $mobile;
    public $direccion;
    public $departamento;
    public $line1;
    public $city;
    
    public $paymentmode;
    public $modo_de_pago;
    public $thankyou;

    public $details;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:60',
            'email' => 'required|email:rfc,dns|max:35',
            'telefono' => 'required|numeric|regex:/[0-9]{8}/|digits:8',
            'direccion' => 'required|max:60',
            'departamento' => 'required|max:60',
            'modo_de_pago' => 'required',
        ]);        
    }

    /* public function sendEmail()
    {
        $details=  [
            'title' => 'Correo de julios.store',
            'body' => 'Listado de Productos'
            foreach(Cart::instance('cart')->content()as $item){
                $orderItem = new OrderItem();
                $orderItem->product_id=$item->id;
                $orderItem->order_id=$item->id;
                $orderItem->price=$item->price;
                $orderItem->quantity=$item->qty;
                $orderItem->save();
            }
        ];

        $mail = Auth::user()->mail;
        Mail::to(Auth::user()->email)->send(new TestMail($details));
        return "Email enviado";
    } */

    public function placeOrder()
    {
        $this->validate([
            'nombre' => 'required|max:50',
            'apellido' => 'required|max:60',
            'email' => 'required|email:rfc,dns|max:35',
            'telefono' => 'required|numeric|regex:/[0-9]{8}/|digits:8',
            'direccion' => 'required|max:60',
            'departamento' => 'required|max:60',
            'modo_de_pago' => 'required',
        ]);



        $order = new Order();
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
           
       /*  $details=  [
            'title' => 'Correo de julios.store',
            'body' => 'Este es un correo de prueba'
        ]; */

        return redirect('/paypal/pay');
    }
     

        
        
    

    
    

    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        else if($this->thankyou)
        {
            /* return redirect()->route('thankyou'); */
           

        }
        else if(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout(); 
        return view('livewire.checkout-component')->layout('layouts.base');
    }
}

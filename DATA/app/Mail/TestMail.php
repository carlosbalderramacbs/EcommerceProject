<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use App\Http\Controllers\TestEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use PayPal\Api\Details;
use Livewire\Component;
use App\Models\User;
use App\Models\Order;
use Cart;
use PDF;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    
    public $details;

    public function __construct($details)
    {
        $this->details=$details;
    }

    public function build()
    {
        /* return $this->view('view.name'); */
        return $this->subject('Comprobante de compra enviado por Julios.store')->view('emails.TestMail');

       /*  Cart::instance('cart')->destroy();
        session()->forget('checkout'); */



        /* return $this->subject('Test Mail From Julios.store')->view('livewire.admin.admin-order-category-component'); */
        /* $order = Order::find($this->order_id);
        return $this->subject('Test Mail From Julios.store')->view('livewire.admin.admin-order-details-component',['order'=>$order]); */
    }
}

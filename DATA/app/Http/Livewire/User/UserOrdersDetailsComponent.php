<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use PDF;

class UserOrdersDetailsComponent extends Component
{
    
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;

    }
    public function downloadUserOrder(/* $order_id */)
    {
        $data = [
            'titulo' => 'Resumen del pedido'
        ];
        /* $order = Order::find($this->order_id); */
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        $pdf = \PDF::loadView('livewire.user.user-orders-details-component',['order'=>$order]);
        return $pdf->download('ResumenPedido.pdf');
    }
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->where('id',$this->order_id)->first();
        return view('livewire.user.user-orders-details-component',['order'=>$order])->layout('layouts.base');
    }
}

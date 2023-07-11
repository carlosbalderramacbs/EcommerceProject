<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use PDF;
use Livewire\WithPagination;

class AdminOrderComponent extends Component
{
    use WithPagination;
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status =$status;
        /* if($status == "") */
        $order->save();
        session()->flash('order_message','Estado del pedido Actualizado exitosamente');
    }
    public function render()
    {
        
        $orders = Order::orderBy('created_at','DESC') ->paginate(12);
        return view('livewire.admin.admin-order-component',['orders'=>$orders])->layout('layouts.base');
    }
}

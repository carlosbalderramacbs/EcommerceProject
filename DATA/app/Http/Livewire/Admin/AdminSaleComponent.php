<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Sale;

class AdminSaleComponent extends Component
{
    public $fecha_oferta;
    public $status;

    public function mount()
    {
        $sale = Sale::find(1);
        $this-> fecha_oferta= $sale->sale_date;
        $this-> status= $sale->status;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'fecha_oferta'=>'required|date',
            /* 'status'=>'required',    */ 
        ]);
    }
    public function updateSale()
    {
        $sale = Sale::find(1);
        $sale->sale_date = $this->fecha_oferta;
        $sale->status =$this->status;
        $this->validate([
            'fecha_oferta'=>'required|date',
            /* 'status'=>'required',    */ 
        ]);
        $sale->save();
        session()->flash('message','Fecha almacenada correctamente ');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout('layouts.base');
    }
}

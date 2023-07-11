<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Deposito;
use Illuminate\Support\Str;


class AdminAddProviderComponent extends Component
{
    public $nombre;
    public $email;
    public $telefono;
    
    public function updated($fields){
        $this->validateOnly($fields,[
            'nombre'=>'required|max:20|unique:depositos',
            'email'=>'required|email:rfc,dns|max:30|unique:depositos',
            'telefono'=> 'required|numeric|regex:/[0-9]{8}/|digits:8',  
        ]);
    }

    public function storeProvider()
    {
        $this->validate([
            'nombre'=>'required|max:20|unique:depositos',
            'email'=>'required|email:rfc,dns|max:30|unique:depositos',
            'telefono'=> 'required|numeric|regex:/[0-9]{8}/|digits:8',             
        ]);
        $deposito = new Deposito();
        $deposito->nombre=$this->nombre;
       /*  $deposito->slug=$this->slug; */
        $deposito->email=$this->email;
        $deposito->telf=$this->telefono;
        $deposito->save();       
        session()->flash('message','Proveedor Creado Exitosamente');/* ->return redirect('livewire.admin.admin-category-component')->layout('layouts.base'); */       
        return redirect()->route('admin.providers');
        
    }
    public function render()
    {
        return view('livewire.admin.admin-add-provider-component')->layout('layouts.base');
    }
}

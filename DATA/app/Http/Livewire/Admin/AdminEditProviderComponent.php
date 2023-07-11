<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Deposito;
use Illuminate\Support\Str;

class AdminEditProviderComponent extends Component
{
    public $provider_slug;
    public $provider_id;
    public $nombre;
    public $slug;
    public $email;
    public $telefono;

    public function mount(/* $provider_slug */$provider_id){
        /* $this->provider_slug=$provider_slug;
        $provider = Deposito::where('slug',$provider_slug)->first(); */
        $provider = Deposito::find($provider_id);   
        $this->provider_id=$provider->id;
        $this->nombre=$provider->nombre;
        $this->email=$provider->email;
        $this->telefono=$provider->telf;
        $this->slug=$provider->slug;
    }
    public function updateProvider(){
        $this->validate([
            'nombre'=>'required|max:20',
            'email'=>'required|email:rfc,dns|max:30',
            'telefono'=> 'required|numeric|regex:/[0-9]{8}/|digits:8',            
        ]);
        $provider = Deposito::find($this->provider_id);
        
        $provider->nombre=$this->nombre;
        $provider->email=$this->email;
        $provider->telf=$this->telefono;
        $provider->save();       
        session()->flash('message','Proveedor Modificado Exitosamente');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-provider-component')->layout('layouts.base');
    }
}

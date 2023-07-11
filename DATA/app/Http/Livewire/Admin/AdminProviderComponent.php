<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Deposito;
use Livewire\WithPagination;

class AdminProviderComponent extends Component
{
    use WithPagination;
    public function deleteProvider($id){
        $provider= Deposito::find($id);
        $provider->delete();
        session()->flash('message','Se elimino el proveedor correctamente');
    }
    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
       
        $depositos =Deposito::where('nombre','LIKE',$searchTerm)
        ->orWhere('email','LIKE',$searchTerm)
        ->orWhere('telf','LIKE',$searchTerm)
        
        ->orderBy('id','ASC')->paginate(5);
        return view('livewire.admin.admin-provider-component',['depositos'=>$depositos])->layout('layouts.base');
    }
}

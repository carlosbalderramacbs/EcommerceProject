<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminAddUserComponent extends Component
{
    public $nombre;
    public $email;
    public $password;
    public $rol;    

    public function updated($fields){
        $this->validateOnly($fields,[
            'nombre'=>'required|max:25',
            'email'=>'required|email:rfc,dns|max:35|unique:users',
            'password'=> 'required|min:8',
            'rol' => 'required',
        ]);
    }

    public function storeUser()
    {    
        $user = new User();
        $user->name=$this->nombre;
        $user->email=$this->email;
        $user->password=Hash::make($this->password);
        $user->utype=$this->rol;
        $this->validate([         
            'nombre'=>'required|max:25',
            'email'=>'required|email:rfc,dns|max:35|unique:users',
            'password'=> 'required|min:8',
            'rol' => 'required',
        ]);            
        $user->save();       
        session()->flash('message','Usuario Creado Exitosamente');/* ->return redirect('livewire.admin.admin-category-component')->layout('layouts.base'); */       
        return redirect()->route('admin.users');        
    }
    public function render()
    {
        return view('livewire.admin.admin-add-user-component')->layout('layouts.base');
    }
}

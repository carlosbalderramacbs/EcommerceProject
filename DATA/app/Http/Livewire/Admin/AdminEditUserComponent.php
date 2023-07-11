<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminEditUserComponent extends Component
{

    public $nombre;
    public $user_id;
    public $email;
    public $password;
    public $rol;
    public $estado;

    public function mount($user_id){
                
        $user = User::find($user_id);     
        $this->user_id=$user->id;     
        $this->nombre=$user->name;
        $this->email=$user->email;
        $this->password=$user->password;
        $this->rol=$user->utype;
        $this->estado=$user->status;

    }    
    public function updateUser(){
        $user = User::find($this->user_id);
        $user->email=$this->email;
        $user->name=$this->nombre;
        /* dd($this->password); */
        if($this->password== $user->password)
            {  
                 
            }        
        else 
        {
            $user->password=Hash::make($this->password);//borrar el hash
        }

        
        $user->utype=$this->rol;
        $user->status=$this->estado;

        $this->validate([         
            'nombre'=>'required|max:25',
            'email'=>'required|email:rfc,dns|max:35',
            'password'=> 'required|min:8',
            'rol' => 'required',
            'estado' => 'required',
        ]);  
        $user->save();       
        session()->flash('message','Usuario Modificado Exitosamente');


    }
    public function render()
    {
        return view('livewire.admin.admin-edit-user-component')->layout('layouts.base');
    }
}

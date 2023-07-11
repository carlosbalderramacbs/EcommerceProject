<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class AdminUserComponent extends Component
{
    use WithPagination;
    public function deleteUser($id){
        $user= User::find($id);
        $user->delete();
        session()->flash('message','Se elimino el usuario correctamente');
    }

    public $searchTerm;

   
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';



        $users=User::where('name','LIKE',$searchTerm)
        ->orWhere('email','LIKE',$searchTerm)
        ->orWhere('utype','LIKE',$searchTerm)
        ->orWhere('status','LIKE',$searchTerm)
        ->orderBy('id','ASC')->paginate(5);
        /* $user= User::find($id); */
        /* ,['users'=>$users] */
        return view('livewire.admin.admin-user-component',['users'=>$users])->layout('layouts.base');
    }
}

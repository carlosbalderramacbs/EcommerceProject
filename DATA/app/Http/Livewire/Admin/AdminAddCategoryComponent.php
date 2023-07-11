<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminAddCategoryComponent extends Component
{
    public $nombre;
    public $slug;
    public function generateslug()
    {
        $this->slug=Str::slug($this->nombre);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'nombre'=>'required',
            'slug'=>'required|unique:categories',
        ]);
    }

    public function storeCategory()
    {
        $this->validate([
            'nombre'=>'required',
            'slug'=>'required|unique:categories',
        ]);
        $category = new Category();
        $category->name=$this->nombre;
        $category->slug=$this->slug;
        $category->save();       
        session()->flash('message','Categoria Creada Exitosamente');/* ->return redirect('livewire.admin.admin-category-component')->layout('layouts.base'); */       
        return redirect()->route('admin.categories');
        
    }
    public function render()
    {
           
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}

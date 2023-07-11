<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $category_slug;
    public $category_id;
    public $nombre;
    public $slug;

    public function mount($category_slug){
        $this->category_slug=$category_slug;
        $category = Category::where('slug',$category_slug)->first();
        $this->category_id=$category->id;
        $this->nombre=$category->name;
        $this->slug=$category->slug;

    }
   
    public function generateslug()
    {
        $this->slug=Str::slug($this->nombre);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'nombre'=>'required|max:20',
            'slug'=>'required',
        ]);
    }
    public function updateCategory(){
        $this->validate([
            'nombre'=>'required|max:20',
            'slug'=>'required',
                      
        ]);
        $category = Category::find($this->category_id);
        $category->slug=$this->slug;
        $category->name=$this->nombre;
        $category->save();       
        session()->flash('message','Categoria Modificada Exitosamente');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}

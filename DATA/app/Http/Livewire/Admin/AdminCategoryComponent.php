<?php


namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;


class AdminCategoryComponent extends Component
{
    use WithPagination;
    public function deleteCategory($id){
        $category= Category::find($id);
        $category->delete();
        session()->flash('message','Se elimino la categoria correctamente');
    }

    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm . '%';
        
        $categories=Category::where('name','LIKE',$searchTerm)
        ->orWhere('slug','LIKE',$searchTerm)        
        ->orderBy('id','ASC')->paginate(10);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout('layouts.base');
    }
}

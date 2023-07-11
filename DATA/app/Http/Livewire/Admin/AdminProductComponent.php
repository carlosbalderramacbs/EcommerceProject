<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Deposito;
use PDF;

class AdminProductComponent extends Component
{
    use WithPagination;
    public function deleteProduct($id){
        $product = Product::find($id);
        $product->delete();
        session()->flash('message','Producto Eliminado Exitosamente');
    }

    public function reabastProduct(){
        $product = Product::find(1);
        $depositos = Deposito::find(1);
        $pdf= PDF::loadView('reabast',compact('product','depositos'));
        return $pdf->download('formularioReabast.pdf');
       /*  return redirect('/downloadreabast-pdf'); */
        /* session()->flash('message','Producto Eliminado Exitosamente'); */ 
    }
    public $searchTerm;

    public function render()
    {

        $searchTerm = '%'.$this->searchTerm . '%';
        $products =Product::where('name','LIKE',$searchTerm)
        ->orWhere('stock_status','LIKE',$searchTerm)
        /* ->orWhere('category_id','LIKE',$searchTerm) */
        /* ->orWhere('status','LIKE',$searchTerm) */
        ->orderBy('id','ASC')->paginate(10);
        return view('livewire.admin.admin-product-component',['products'=>$products])->layout('layouts.base');
    }
}

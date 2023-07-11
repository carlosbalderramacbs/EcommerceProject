<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminAddProductComponent extends Component
{
    
    use WithFileUploads;
    public $name;
    public $slug;
    public $descripcion_breve;
    public $descripcion;
    public $precio_regular;
    public $precio_oferta;
    public $SKU;
    public $estado_producto;
    public $cantidad;
    public $medida;
    public $image;
    public $categoria;

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name,'-');
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required|unique:products|max:50',
            'slug'=>'required|unique:products|max:50',
            'descripcion_breve' => 'required|max:180',
            'descripcion' => 'required',
            'precio_regular' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'precio_oferta' => 'nullable|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'SKU' => 'required|max:15',
            'estado_producto' => 'required',
            'cantidad' => 'required|numeric|digits_between:1,8',
            'medida' => 'required',
            'image' => 'required',
            'categoria' => 'required',
        ]);
    }
    /* public function mount(){
        $this->stock_status='Seleccionar estado';
        
    } 
    
    */
    public function addProduct(){

        $this->validate([
            'name'=>'required|unique:products|max:50',
            'slug'=>'required|unique:products|max:50',
            'descripcion_breve' => 'required|max:150',
            'descripcion' => 'required|max:200',
            'precio_regular' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'precio_oferta' => 'nullable|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'SKU' => 'required|max:15',
            'estado_producto' => 'required',
            'cantidad' => 'required|numeric|digits_between:1,8',
            'medida' => 'required',
            'image' => 'required',
            'categoria' => 'required',
        ]);

        /* dimensions()->maxWidth(800)->maxHeight(800) image */
        $product = new Product();
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->descripcion_breve;
        $product->description=$this->descripcion;
        $product->regular_price=$this->precio_regular;
        $product->sale_price=$this->precio_oferta;
        $product->quantity=$this->cantidad;
        $product->unity=$this->medida;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->estado_producto;
        $imageName=Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        $product->category_id=$this->categoria;
        /* $category->category_id=$this->categoria; */
        $product->save();
        
        session()->flash('message','Producto Agregado Exitosamente');
        return redirect()->route('admin.products');
        

    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout('layouts.base');
    }
}

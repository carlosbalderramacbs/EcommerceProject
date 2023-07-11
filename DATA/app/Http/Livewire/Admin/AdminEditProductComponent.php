<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Str;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditProductComponent extends Component
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
    public $newimage;
    public $product_id;

    public function mount($product_slug){
        $product= Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->descripcion_breve=$product->short_description;
        $this->descripcion=$product->description;
        $this->precio_regular=$product->regular_price;
        $this->SKU=$product->SKU;
        $this->estado_producto=$product->stock_status;
        $this->cantidad=$product->quantity;
        $this->medida=$product->unity;
        $this->image=$product->image;
        $this->categoria=$product->category_id;
        /* $this->product_id=$product->product_id; */
        $this->product_id = $product->id;
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required|max:50',
            'slug'=>'required|max:50',
            'descripcion_breve' => 'required|max:150',
            'descripcion' => 'required',
            'precio_regular' => 'required|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'precio_oferta' => 'nullable|numeric|regex:/^[\d]{0,11}(\.[\d]{1,2})?$/',
            'SKU' => 'required|max:15',
            'estado_producto' => 'required',
            'cantidad' => 'required|numeric|digits_between:1,8',
            'medida' => 'required',
            'image' => 'required ',
            'categoria' => 'required',
        ]);
    }

    public function generateSlug()
    {
        $this->slug=Str::slug($this->name,'-');
    }
    public function updateProduct(){

        $this->validate([
            'name'=>'required|max:50',
            'slug'=>'required|max:50',
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
        $product = Product::find($this->product_id);
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->descripcion_breve;
        $product->description=$this->descripcion;
        $product->regular_price=$this->precio_regular;
        $product->sale_price=$this->precio_oferta;
        $product->quantity=$this->cantidad;
        if($this->newimage){
            $imageName=Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('products',$imageName);
            $product->image=$imageName;
        }
        $product->unity=$this->medida;
        $product->SKU=$this->SKU;
        $product->stock_status=$this->estado_producto;
        
        $product->category_id=$this->categoria;
        $product->save();
        session()->flash('message','Producto Actualizado Exitosamente');
        return redirect()->route('admin.products');


    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-edit-product-component',['categories'=>$categories])->layout('layouts.base');;
    }
}

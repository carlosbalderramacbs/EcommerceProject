<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;
use Cart;

class DetailsComponent extends Component
{
    public $slug;
    public $cantidad;
    public $product_qty;
    public $nose;
    public $pctnd;
    
    /* public $cantidad  = $product->quantity; */
    

    public function mount($slug/* $product_quantity */){
        
        /* $user->name=$this->nombre; */
        /* $product->quantity; */
        /* dd($this->product_qty); */
        $this->slug=$slug;
        $this->cantidad = 1;
        $product = Product::where('slug',$this->slug)->first();
        $cuantidad = $product->quantity;
        
        $this->validate([    
             
            /* 'required|numeric|regex:/[0-9]{8}/|digits:8' */      
            'cantidad' => "required|numeric|min:1|max:$cuantidad",           
        ]);   
       /*  $this->product_qty=$product_quantity; */
        /* dd($this->product_qty); */
    }
    
    public function store($product_id,$product_name,$product_price)
    {
        
        $product = Product::where('slug',$this->slug)->first();
        $cuantidad = $product->quantity;
        /* dd($cuantidad); CANTIDA PRODUCTO*/
        $xabc=$this->cantidad; //CANTIDAD EN EL INPUT
       /*  dd($xabc); */
        $abc=Cart::instance('cart')->content();
        /* dd($abc); */
        /* $qyc = $abc->$rowId->qty;
        dd($qyc); */
        $this->validate([      
           'cantidad' => "required|numeric|min:1|max:$cuantidad",          
        ]);   
/*         $product = Product::where('slug',$this->slug)->first()->decrement('quantity', $item->qty);*/
        if($cuantidad < $this->cantidad)
        {

        }
        else {
         Cart::instance('cart')->add($product_id,$product_name,$this->cantidad,$product_price)->associate('App\Models\Product'); 
       /*  foreach( Cart::instance('cart')->content() as $item) 
            {
               
                Product::where('id',  $item->id)->decrement('quantity', $this->cantidad);


            } */
            
        session()->flash('success_message','Producto Agregado exitosamente');
        return redirect()->route('product.cart');
        }
    }
    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $popular_products = Product::inRandomOrder()->limit(4)->get();
        $related_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $sale = Sale::find(1);
        return view('livewire.details-component',['product'=>$product,'popular_products'=>$popular_products,'related_products'=>$related_products,'sale'=>$sale])->layout('layouts.base');
    }
    public function increaseQuantity()
    {        
        $this->cantidad++;
        
    }
    public function decreaseQuantity()
    {
        if($this->cantidad>1)
        {
            $this->cantidad--;
        }
    }
}

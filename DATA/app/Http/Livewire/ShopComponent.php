<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;
use App\Models\Category;
use App\Models\Sale;

class ShopComponent extends Component
{
    public $sorting;
    public $pagesize;

    public function mount()
    {
        $this->sorting="default";
        $this->pagesize="12";
    }
    public function store($product_id,$product_name,$products_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$products_price)->associate('App\Models\Product');
        session()->flash('success_message','Producto Agregado exitosamente');
        return redirect()->route('product.cart');

        // cart :: instance('cart')-> eliminar xd
    }

    public function addToWlist($product_id,$product_name,$products_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$products_price)->associate('App\Models\Product');

        $this->emitTo('wishlist-count-component','refreshComponent');
    }
    public function storeWR($product_id,$product_name,$products_price)
    {   
        
        Cart::instance('cart')->add($product_id,$product_name,1,$products_price)->associate('App\Models\Product');
        /* session()->flash('success_message','Producto Agregado exitosamente');
        return redirect()->route('product.cart'); */

        // cart :: instance('cart')-> eliminar xd
    }
    
    public function removeFromWishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem)
        {
            if($witem->id == $product_id)
            {
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }
        }
    }
    public function removeFromCart($product_id)
    {
        foreach(Cart::instance('cart')->content() as $citem)
        {
            if($citem->id == $product_id)
            {
                Cart::instance('cart')->remove($citem->rowId);
                /* $this->emitTo('wishlist-count-component','refreshComponent'); */
                return;
            }
        }
    }

    use WithPagination;
    public function render()
    {
        if($this->sorting=='date')
        {
            $products = Product::orderBy('created_at','DESC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price')
        {
            $products = Product::orderBy('regular_price','ASC')->paginate($this->pagesize);
        }
        else if($this->sorting=='price-desc')
        {
            $products = Product::orderBy('regular_price','DESC')->paginate($this->pagesize);
        }
        else 
        {
            $products = Product::orderBy('id','ASC')->paginate($this->pagesize); 
        }
        
        $categories= Category::all();
        $sale = Sale::find(1);
        return view('livewire.shop-component',['products'=>$products,'categories'=>$categories,'sale'=>$sale])->layout('layouts.base');
    }
}

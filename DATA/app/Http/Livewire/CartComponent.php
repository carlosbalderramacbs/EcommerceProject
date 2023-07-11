<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Cart;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{
    public $cantidad;

    public function increaseQuantity($rowId)
    {

        $product = Cart::instance('cart')->get($rowId);
        $cuantidad =$product->model->quantity;
        $this->cantidad = $product->qty   ;
        $qty = $product->qty;
        $this->validate([                   
            
            'cantidad' => "required|numeric|min:1|max:$cuantidad",           
        ]); 
        if($qty < $product->model->quantity){
            
            
            $qty++;
            
            $qtx=$product->quantity;        
            
            Cart::instance('cart')->update($rowId,$qty);
        }
        
    }
    public function mount(){
        
        /* $citems = Cart::instance('cart')->content()->pluck('rowId');
        $d = Cart::content($citems); */
        /* dd($d); */
        /* $product = Cart::instance('cart')->get($rowId); */
        $celltd=  Cart::instance('cart')->content();
        /* foreach(Cart::instance('cart')->content() as $item)
        {
           
        } */
        /* dd($celltd); */

        /* foreach ($items)
        $cuantidad = $product->quantity;
        $this->validate([                
            'cantidad' => "required|numeric|min:1|max:$cuantidad",           
        ]);  */
        /* foreach (Cart::instance('cart')->content() )
        {
            dd('a');
        } */
        /* $this->cantidad = 1; */
        /* $product = Product::where('slug',$this->slug)->first(); */
        /* foreach(Cart::instance('cart')->get(Id) as $Item) */
       /*  foreach(Cart::instance('cart')->content()->pluck('id')
        {
            dd($item);
        } */
        /* $citems = Cart::instance('cart')->content()->pluck($rowId);
        dd($citems); */
        $product = Cart::instance('cart')->content()/* ->get($rowId) */ ;
        
        /* foreach($product as $item)
        */ /* dd($product); */ 
        /* foreach($product as $item) */
            /* dd($item); */
            
        /* $cuantidad = $item->model->quantity; */
        /* dd($cuantidad); */
        /* $this->validate([                
            'cantidad' => "required|numeric|min:1|max:$cuantidad",           
        ]);    */
       
    }
    public function decreaseQuantity($rowId)
    {   
        $product = Cart::instance('cart')->get($rowId);
        $cuantidad =$product->model->quantity;
        $this->cantidad = $product->qty   ;
        $qty = $product->qty;
        $qty=$product->qty-1;
        $qtx=$product->quantity; 
        $a=(int)1;
        /* $abc = $product->model->quantity+1;
        $product->model->quantity->increment('quantity',$abc); */
        Cart::instance('cart')->update($rowId,$qty);
       /*  $this->validate([                   
            
            'cantidad' => "required|numeric|min:1|max:$cuantidad",           
        ]);  */                  
        
        /* } */
    }
    
    /* public $qty;
    

    public function mount(){
       
        $this->qty = 1;
      
    }
    public function increaseQuantity()
    {
       
        $this->qty++;
        
    }
    public function decreaseQuantity()
    {
        if($this->qty>1)
        {
            $this->qty--;
        }
    } */
    public function verCantidad($rowId)
    {
        /* foreach( Cart::instance('cart')->content() as $item) */
        $product = Cart::instance('cart')->get($rowId);
        dd($product);
        
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('success_message','Producto eliminado');
    }
    public function destroyAll()
    {
        Cart::instance('cart')->destroy();
    }
   
   





    public function setAmountForCheckout(){

        if(!Cart::instance('cart')->count()>0)
        {
            session()->forget('checkout');
            return;
        }
        if(session()->put('checkout',[
            'discount' => 0,
            'subtotal'=> Cart::instance('cart')->instance('cart')->subtotal(),
            'total' => Cart::instance('cart')->total()
            /* 'total' => Cart::instance('cart')->instance('cart')->total() */
        ]));
    }
   /*  public function validarcantidad(){
        foreach(Cart::instace('cart')->content()->qty)
    } */
    public function checkout()
    {   

       /*  foreach (Cart::instance('cart')->content() as $item)
        {
            if(item->where('product_id',$request->product_id)->first();)
            $product = $item->pluck('id');
            dd($product);
                $cuantidad = $product->quantity; 
               

            $this->validate([      
                'cantidad' => "required|numeric|min:1|max:$cuantidad",          
            ]);
        } */

        if(Auth::check())
        {
            return redirect('checkout');
        }
        else
        {
            return redirect()->route('login');
        }
    }
    public function render()
    {
         
        $this->setAmountForCheckout();
        $sale = Sale::find(1);
        return view('livewire.cart-component',['sale'=>$sale])->layout('layouts.base');
    }
}

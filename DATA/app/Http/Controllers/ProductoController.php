<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        
        return view('producto.index')->with('products',$products);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products=Product::all();
        return view('producto.create')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo'=>'required|max:10|filled',
            'nombre'=>'required|max:15|filled',
            'cantidad'=>'required|between:1,4|filled',
            'precio'=>'required|between:1,7|filled',
        ]);
        $products = new Product();

        $products->name = $request->get('name');
        $products->slug = $request->get('slug');
        $products->asd = $request->get('cantidad');
        $products->precio = $request->get('precio');

        $products->save();

        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Product::find($id);
        return view('producto.edit')->with('product',$product)->with('info','La categoria se actualizco con exito');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'codigo'=>'required|max:10|filled',
            'nombre'=>'required|max:15|filled',
            'cantidad'=>'required|between:1,4|filled',
            'precio'=>'required|between:1,7|filled',
        ]);
        $producto = Producto::find($id);
        

        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect('/productos');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

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
        return view('admin.producto.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producto.create');
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

       /*  $products->codigo = $request->get('codigo'); */
        $products->image = $request->get('cantidad');
        $products->name = $request->get('nombre');
        $products->stock_status = $request->get('cantidad');
        $products->regular_price = $request->get('precio');
        $products->category->name = $request->get('cantidad');
        $products->created_at = $request->get('precio');

        $products->save();

        return redirect()->route('admin.productos.index',compact('product'));
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
        
        $producto = Producto::find($id);
        return view('admin.producto.edit')->with('producto',$producto)->with('info','La categoria se actualizco con exito');
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
        $product = Product::find($id);
        

        $product->codigo = $request->get('codigo');
        $product->nombre = $request->get('nombre');
        $product->cantidad = $request->get('cantidad');
        $product->precio = $request->get('precio');

        $product->save();

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

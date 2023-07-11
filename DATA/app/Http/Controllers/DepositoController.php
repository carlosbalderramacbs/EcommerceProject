<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposito;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Deposito::all();
        return view('proveedor.index')->with('proveedores',$proveedores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedor.create');
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
            
            'nombre'=>'required',
            'email'=>'required|email:rfc,dns|max:20',
            'telf'=>'required|max:8',
        ]);
        $proveedores = new Deposito();

        $proveedores->nombre = $request->get('nombre');
        $proveedores->email = $request->get('email');
        $proveedores->telf = $request->get('telf');

        $proveedores->save();

        return redirect('/proveedores');
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
        $proveedor = Deposito::find($id);
        
        return view('proveedor.edit')->with('proveedor',$proveedor);
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
            
            'nombre'=>'required',
            'email'=>'required|email:rfc,dns',
            'telf'=>'required|max:8',
        ]);
        $proveedor = Deposito::find($id);      
        $proveedor->nombre = $request->get('nombre');
        $proveedor->email = $request->get('email');
        $proveedor->telf = $request->get('telf');

        $proveedor->save();

        return redirect('/proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

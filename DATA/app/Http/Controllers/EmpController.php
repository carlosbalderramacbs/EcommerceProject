<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Deposito;
use App\Models\Category;

use PDF;
use App\Models\Order;

class EmpController extends Controller
{
    public $order_id;
    public function getAllUsers()
    {
        $usuarios = User::all();
        return view('usuario',compact('usuarios'));
    }
    public function downloadPDF()
    {
        $usuarios = User::all();
        $pdf= PDF::loadView('usuario',compact('usuarios'));
        return $pdf->download('usuarios.pdf');
    }
    public function getAllProducts()
    {
        $products = Product::all();
        return view('producto',compact('products'));
    }
    public function downloadProductPDF()
    {
        $products = Product::all();
        $pdf= PDF::loadView('producto',compact('products'));
        return $pdf->download('productos.pdf');
    }
    public function getAllProviders()
    {
        $depositos = Deposito::all();
        return view('provider',compact('depositos'));
    }
    public function downloadProviderPDF()
    {
        $depositos = Deposito::all();
        $pdf= PDF::loadView('provider',compact('depositos'));
        return $pdf->download('proveedores.pdf');
    }

    public function downloadProviderProductPDF($id)
    {
        $products = Product::find($id);
        $depositos = Deposito::find(1);
        $pdf= PDF::loadView('provider',compact('depositos','products'));
        return $pdf->download('reabast.pdf');
    }
    public function downloadOrdersPDF($id)
    {
        $products = Product::find($id);
        $depositos = Deposito::find(1);
        $pdf= PDF::loadView('provider',compact('depositos','products'));
        return $pdf->download('orders.pdf');
    }

    public function downloadUserOrder()
    {
        $data = [
            'titulo' => 'Resumen del pedido'
        ];
        $order = Order::find($this->order_id);
        $pdf = \PDF::loadView('livewire.user.user-orders-details-component',['order'=>$order]);
        return $pdf->download('ResumenPedido.pdf');
    }
    public function downloadCategoryPDF()
    {
        $categories = Category::all();
        $pdf= PDF::loadView('category',compact('categories'));
        return $pdf->download('Categorias.pdf');
    }
}   

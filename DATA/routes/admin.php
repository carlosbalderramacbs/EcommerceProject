<?php
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ChtController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use Illuminate\Support\Facades\Route;

use App\http\Controllers\Admin\UserController;
use App\http\Controllers\Admin\ProductoController;
use App\http\Controllers\Admin\CategoryController;
use App\http\Controllers\Admin\DepositoController;

Route::get('',[HomeController::class,'index'])->name('admin.home');

/* Route::get('', function(){
    return "hola adm";
}); */

/* Route::resource('admin/productos','App\Http\Controllers\ProductoController');
Route::resource('/usuarios','App\Http\Controllers\UserController');
Route::resource('/proveedores','App\Http\Controllers\DepositoController'); */


Route::resource('usuarios',UserController::class)->names('admin.usuarios'); 
Route::resource('productos',ProductoController::class)->names('admin.productos'); 
Route::resource('proveedores',DepositoController::class)->names('admin.proveedores'); 
Route::resource('categorias',CategoryController::class)->names('admin.categories');  
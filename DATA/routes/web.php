<?php
use App\Http\Controllers\EmpController;

use App\Http\Controllers\ChtController;
use App\Http\Controllers\ProductController;


use App\Http\Controllers\PaymentController;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\FailedComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\WishlistComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminProviderComponent;
use App\Http\Livewire\Admin\AdminAddProviderComponent;
use App\Http\Livewire\Admin\AdminEditProviderComponent;
use App\Http\Controllers\TestEmail;

use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\AdminAddUserComponent;
use App\Http\Livewire\Admin\AdminEditUserComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminDetailComponent;
use App\Http\Livewire\Admin\AdminOrderComponent;
use App\Http\Livewire\Admin\AdminOrderDetailsComponent;
use App\Http\Livewire\Admin\AdminSaleComponent;

use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\CheckoutComponent;
use Illuminate\Support\Facades\Route;


use App\Http\Livewire\User\UserOrdersComponent;
use App\Http\Livewire\User\UserOrdersDetailsComponent;

use App\Http\Controllers\MailController;


use App\Http\Controllers\ChartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
    return view('welcome');
});
 */

Route::get('/',HomeComponent::class);
Route::get('/shop',ShopComponent::class);
Route::get('/cart',CartComponent::class)->name('product.cart');
Route::get('/checkout',CheckoutComponent::class);
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');
Route::get('/search',SearchComponent::class)->name('product.search');
Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');
Route::get('/Failed',FailedComponent::class)->name('failed');



Route::resource('productos','App\Http\Controllers\ProductoController');
Route::resource('usuarios','App\Http\Controllers\UserController');
Route::resource('proveedores','App\Http\Controllers\DepositoController');
/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */
Route::get('/get-all-users',[EmpController::class,'getAllUsers' ]);
Route::get('/download-pdf',[EmpController::class,'downloadPDF' ]);
Route::get('/get-all-products',[EmpController::class,'getAllProducts' ]);
Route::get('/downloadproduct-pdf',[EmpController::class,'downloadProductPDF' ]);
Route::get('/get-all-providers',[EmpController::class,'getAllProviders' ]);
Route::get('/downloadprovider-pdf',[EmpController::class,'downloadProviderPDF' ]);
Route::get('/downloadreabast-pdf',[AdminProductComponent::class,'reabastProduct' ]);
Route::get('/downloadcategory-pdf',[EmpController::class,'downloadCategoryPDF' ]);

Route::get('/userorderdetail-pdf',[UserOrdersDetailsComponent::class,'downloadUserOrder' ]);

Route::get('/wlist',WishlistComponent::class)->name('product.wlist');


Route::get('echarts', 'EchartController@echart');

Route::get('pie', 'ProductController@get_all_products_for_pie_chart');



Route::get('/chart',[ChartController::class,'index']);




/* Route::get('/cht',[ChtController::class,'index']); */
Route::get('/bar-chart',[ChartController::class,'barChart']);
Route::get('/order-chart',[ChartController::class,'OrderChart']);
Route::get('/orderbar-chart',[ChartController::class,'OrderbarChart']);
Route::get('/product-chart',[ChartController::class,'ProductChart']);
Route::get('/products-chart',[ChartController::class,'ProductsChart']);
Route::get('/productos-vendidos',[ChartController::class,'ProductosvendChart']);
Route::get('/fechas-chart',[ChartController::class,'FechasChart']);
Route::get('/productbar-chart',[ChartController::class,'productbarChart']);
Route::get('/productqty-chart',[ChartController::class,'productqty']);
Route::get('/productpie-chart',[ChartController::class,'productpie']);






Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/user/orders',UserOrdersComponent::class)->name('user.orders');
    Route::get('/user/orders/{order_id}',UserOrdersDetailsComponent::class)->name('user.ordersdetails');


});


// ADMIN ROUTES

Route::middleware(['auth:sanctum', 'verified','authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard'); 
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.addcategory'); 
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.editcategory');
    
    Route::get('/admin/users',AdminUserComponent::class)->name('admin.users');
    Route::get('/admin/user/add',AdminAddUserComponent::class)->name('admin.adduser'); 
    Route::get('/admin/user/edit/{user_id}',AdminEditUserComponent::class)->name('admin.edituser');

    Route::get('/admin/providers',AdminProviderComponent::class)->name('admin.providers');
    Route::get('/admin/providers/add',AdminAddProviderComponent::class)->name('admin.addprovider'); 
    Route::get('/admin/provider/edit/{provider_id}',AdminEditProviderComponent::class)->name('admin.editprovider');
 

    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.addproduct'); 
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.editproduct'); 
    Route::get('/admin/details',AdminDetailComponent::class)->name('admin.details');
    Route::get('/admin/sale',AdminSaleComponent::class)->name('admin.sale');
    Route::get('/admin/orders',AdminOrderComponent::class)->name('admin.orders');
    Route::get('/admin/orders/{order_id}',AdminOrderDetailsComponent::class)->name('admin.orderdetails');

});


Route::get('/paypal/pay', 'App\Http\Controllers\PaymentController@payWithPayPal');
Route::get('/paypal/status', 'App\Http\Controllers\PaymentController@payPalStatus');

Route::get('/send-email',[MailController::class,'sendEmail']);

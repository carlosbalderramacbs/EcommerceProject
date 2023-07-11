<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
/* use DB; */

class ChartController extends Controller
{
    public function index(){
    	$users =User::select(DB::raw("COUNT(*) as count"))
    	/* ->whereYear('created_at',date('Y')) */
		->whereYear('created_at', '=', '2021')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');
		/* dd($users);  CANTIDAD DE USUARIOS POR MES */
		/* dd($users); */
		/* whereYear('created_at', 2017)->get(); */	

    	$months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
    	$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$users[$index];
    	}
		/** AÑO 2023 */

		$usetw =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montw = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas1 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montw as $index => $month) {
    		$datas1 [$month-1] =$users[$index];
    	}
		/** AÑO 2023 */
		$uset =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$mont = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas2 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($mont as $index => $month) {
    		$datas2 [$month-1] =$users[$index];
    	}
		/** AÑO 2024 */
		$usetx =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montx = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas3 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montx as $index => $month) {
    		$datas3 [$month-1] =$users[$index];
    	}
		/** AÑO 2025 */
		$usetxx =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montxx = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas4 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montxx as $index => $month) {
    		$datas4 [$month-1] =$users[$index];
    	}
		








/* 
		$date = explode(" - ", request()->input('from-to', "")); 

if(count($date) != 2)
{
    $date = [now()->subDays(29)->format("Y-m-d"), now()->format("Y-m-d")];
}

$settings = [
    'chart_title'           => 'Amount by days',
    'chart_type'            => 'line',
    'report_type'           => 'group_by_date',
    'model'                 => 'App\\Transaction',
    'group_by_field'        => 'transaction_date',
    'group_by_period'       => 'day',
    'aggregate_function'    => 'sum',
    'aggregate_field'       => 'amount',
    'filter_field'          => 'transaction_date',
    'range_date_start'      => $date[0],
    'range_date_end'        => $date[1],
    'group_by_field_format' => 'Y-m-d H:i:s',
    'column_class'          => 'col-md-12',
    'entries_number'        => '5',
    'continuous_time'       => true,
];

$chart = new LaravelChart($settings); */






































    	return view('chart',compact('datas','datas1','datas2','datas3','datas4'/* ,'chart' */));
    }

	public function barChart(){
    	$users =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');
		/* dd($users); */
    	$months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
    	$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$users[$index];
    	}

		/** AÑO 2023 */

		$usetw =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montw = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas1 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montw as $index => $month) {
    		$datas1 [$month-1] =$users[$index];
    	}
		/** AÑO 2023 */
		$uset =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$mont = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas2 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($mont as $index => $month) {
    		$datas2 [$month-1] =$users[$index];
    	}
		/** AÑO 2024 */
		$usetx =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montx = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas3 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montx as $index => $month) {
    		$datas3 [$month-1] =$users[$index];
    	}
		/** AÑO 2025 */
		$usetxx =User::select(DB::raw("COUNT(*) as count"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');

		$montxx = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		$datas4 = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($montxx as $index => $month) {
    		$datas4 [$month-1] =$users[$index];
    	}

    	return view('bar-chart',compact('datas','datas1','datas2','datas3','datas4'));
    }
	public function OrderChart(){


		$orders = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');


		
				
		
		$months = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		/* dd($months); */
		$datas = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$orders[$index];
    	}
	
		$integerIDs = array_map('intval', $datas);
		



		// 2022

		$orders1 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months1 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas1 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months1 as $index => $month) {
    		$datas1[$month-1] =$orders1[$index];
    	}
	
		$integerID2s = array_map('intval', $datas1);

		// 2023

		$orders2 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months2 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas2 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months2 as $index => $month) {
    		$datas2[$month-1] =$orders2[$index];
    	}
	
		$integerID3s = array_map('intval', $datas2);
		/* dd($integerID3s); */
		// 2024

		$orders3 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months3 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas3 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months3 as $index => $month) {
    		$datas3[$month-1] =$orders3[$index];
    	}
	
		$integerID4s = array_map('intval', $datas3);
    	

		// 2025

		$orders4 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2025')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months4 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2025')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas4 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months4 as $index => $month) {
    		$datas4[$month-1] =$orders4[$index];
    	}
		
		$integerID5s = array_map('intval', $datas4);




    	return view('order-chart',compact('integerIDs','integerID2s','integerID3s','integerID4s','integerID5s'));

		
    }

	public function ProductChart(){

		/* ->whereYear('created_at',date('Y')) */
		/* whereYear('created_at', 2017)->get(); */	
		/* $users =User::select(DB::raw("COUNT(*) as count"))
    	
		->whereYear('created_at', '=', '2021')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');
		

    	$months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

    	$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$users[$index];
    	} */

		$daas  = OrderItem::select(DB::raw("COUNT(*) as count"))
		->groupBy('product_id')
		->orderByDesc('count')
		->limit(3)
		->get();

	/* 	dd($daas); */


		$prx = OrderItem::select(DB::raw('SUM(price * quantity) as total_ventas'))
        ->groupBy('product_id')
        ->get()
		->pluck('total_ventas');

		$months = OrderItem::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2021')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month'); 
		$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
		foreach ($months as $index => $month) {
    		$datas[$month-1] =$prx[$index];
    	}
	
		$integerIDs = array_map('intval', $datas);
		
/*
		$months1 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month'); */

	
		return view('product-chart' , compact('integerIDs')); 

	}
	public function ProductsChart(){
	
		$daxas  = OrderItem::select(DB::raw("COUNT(*) as count"))
		->groupBy('product_id')
		->orderByDesc('count')
		->limit(3)
		->get()
		->pluck('count');
		/* dd($daxas); */
		
		$prx = OrderItem::select(DB::raw('SUM(price * quantity) as total_ventas'))
        ->groupBy('product_id')
		->limit(3)
        ->get()
		
		->pluck('total_ventas');  
		/*  dd($prx); */
		$months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

    	$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($daxas as $index => $daxas) {
    		$datas[$daxas] =$prx[$index];
    	}
		
		/* $integerIDs = array_map('intval', $datas);
		dd($integerIDs);
		$months = OrderItem::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2021')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month'); 

		$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
		foreach ($months as $index => $month) {
    		$datas[$month-1] =$datas[$index];
    	}
		 */
		$integerIDs = array_map('intval', $datas);
		dd($integerIDs);

		return view('products-chart' , /* ['Data' => $Data] */ /* , */ compact('integerIDs')); 

	}
	public function ProductosvendChart(){

		$daxas  = OrderItem::select(DB::raw("COUNT(*) as count"))
		->groupBy('product_id')
		->orderByDesc('count')
		->limit(3)
		->get()
		->pluck('count');
		/* dd($daxas); */
		
		$prx = OrderItem::select(DB::raw('SUM(price * quantity) as total_ventas'))
        ->groupBy('product_id')
		->limit(3)
        ->get()
		
		->pluck('total_ventas');  
		/*  dd($prx); */
		$months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

    	$datas = array(0,0,0,0,0,0,0,0);
    	foreach ($daxas as $index => $daxas) {
    		$datas[$daxas] =$prx[$index];
    	}

		$integerIDs = array_map('intval', $datas);
		/* dd($integerIDs); */

		$product = new Product();
		$order = new Order();
		$data = DB::table('order_items')
		->select(
			DB::raw('product_id as productid'),
			DB::raw('count(*) as price'))
			->groupBy('productid')
			->get();
		/* dd($data) */
			$nombre = DB::table('order_items') 
			 ->select(
				DB::raw('product_id as pid'))
				->groupBy('pid')
				->pluck('pid')/* ->product->name */;
			/* 	 dd($nombre);  */
				 
				foreach ($nombre as $item) 
				{
					$a = Product::find($nombre)->pluck('name');
					
				}

		/* $join = DB::table('products')
		->join('orders','products') */



		/*  dd($nombre); */ 
/* 
		$productos = DB:: */
	/* 	$data = DB::table('products')
		->select(
			DB::raw('name as pname'),
			DB::raw('count(*) as quantity'))
			->groupBy('pname')
			->get();

		dd($data); */

		/* $datas  = OrderItem::select(DB::raw("COUNT(*) as count"))
		->groupBy('product_id')
		->orderByDesc('count')
		->limit(3)
		->get()
		->pluck('count');
		dd($datas); */
		


		/* dd($data); */

		/* 	$array = ['productid' , ' price'];
			foreach($data as $key => $value)
			{
				$array[++$key ] =[$value->price, $value->number];

				dd($array);
			} */
			
		/* $data = DB::table('order_items')
        ->join('products','order_items.product_id','=','product_id')
        ->select('name', DB::raw('SUM(order_items.price * order_items.quantity) as total_sales'))
        ->groupBy('product_id')
        ->get();
		dd($data); */
		
		/* $a= "kajsdad";
		dd($a); */
		/* d = OrderItems();
		$prod_name =[];
		foreach($order_items as $orderitemss)
			{
				$prod_name[$order_items->product_id] = DB::table("products")->where('id',  $order_items->product_id)->value('name');
				dd($prod_name);
			} */
		/* dd($a); */
		/* dd($a); */
		$text = str_replace('"', "'", $a);
		/* dd($text); */

		return view('productos-vendidos', compact('a','integerIDs','text')); 




	}
	public function FechasChart(){

	/* 	$nose = User::pluck('created_at')->toArray();;
		dd($nose);
		$roles = DB::table('users')->pluck('created_at')->toArray();
		$prueba = DB::raw("CONCAT(UNIX_TIMESTAMP(DATE(created_at)), '000000') as date");
		dd($prueba); */

	/* 	$stats = DB::table('order_items')
				->orderBy('created_at', 'ASC')
               ->get([
				DB::raw("CONCAT(UNIX_TIMESTAMP(DATE(created_at)), '000') as date"),
				
              
			   ]);

		dd($stats); */


		$precio = DB::table('order_items')->select(DB::raw('SUM(price * quantity) as total_ventas'))
		->groupBy('id')
        ->orderBy('created_at', 'ASC')		
        ->get();


		$status = DB::table('order_items')            
		->orderBy('created_at', 'ASC') 
		->get([
		DB::raw("CONCAT(UNIX_TIMESTAMP((created_at)), '000') as date"),
			]);





			/* $precio = DB::table('order_items')->select(DB::raw('SUM(price * quantity) as total_ventas'))
			->groupBy('id')
			->orderBy('created_at', 'ASC')		
			->get();
	
	
			$status = DB::table('order_items')            
			->orderBy('created_at', 'ASC') 
			->get([
			DB::raw("CONCAT(UNIX_TIMESTAMP((created_at)), '000') as date"),
				]);  COPIA DE BACKUPS*/
	
		/* dd($status); */  

		/* $array1 = [$status,$precio];
		dd($array1); */

		$funciona = [[1618322124000,648.00],[1618322186000,225.00],[1620913883000,4500.00],[1620914124000,750.00],[1620914710000,50.00],[1623592115000,50.00],[1623592175000,150.00],[1623592235000,25.00],[1623592297000,25.00],[1623592359000,25.00],[1623592421000,108.00],[1623592483000,40.00],[1623592535000,841.00],[1623592584000,200.00],[1623592644000,200.00],[1623592704000,150.00],[1623592764000,700.00],[1623592783000,9000.00],[1623592901000,550.00],[1623593110000,350.00],[1623593170000,24.00],[1623593230000,1000.00],[1623593290000,40.00],[1623593364000,1500.00],[1623593424000,2250.00],[1623593471000,1500.00],[1623593531000,2250.00],[1623678515000,30.00],[1623678575000,1000.00],[1623703768000,50.00],[1623705752000,50.00],[1623705974000,130.00],[1623706250000,130.00],[1623706250000,180.00],[1623706489000,50.00],[1623706725000,25.00],[1623706725000,15.00],[1623706725000,25.00],[1623706836000,105.00],[1623706836000,25.00],[1623707004000,25.00],[1623707004000,85.00],[1623707164000,100.00],[1623707355000,50.00],[1623715889000,50.00],[1623715904000,50.00],[1623725494000,1000.00],[1623725494000,550.00],[1623726012000,50.00],[1623726012000,100.00],[1623726012000,23.00],[1623726012000,24.50],[1623726012000,50.00],[1623818108000,50.00],[1624142398000,100.00]];
			/* dd($funciona); */
			/*    dd($precio); */


		/* $integerIDs = array_map('intval', $stats);
		dd($integerIDs); */
		/* $a = json_encode($stats); */
		/* dd($a); */



		


		/* $status = DB::table('order_items')->select(DB::raw('DATE(created_at) as day'))
				->groupBy('day')
		      
	            ->get([
				DB::raw("CONCAT(UNIX_TIMESTAMP(('day')), '000')"),
                ]);
        
		dd($status); */

		/* $status = DB::table('order_items')->select(DB::raw('DATE(created_at) as day'))
				->groupBy('day')
		        ->orderBy('created_at', 'ASC') 
	            ->get([
				DB::raw("CONCAT(UNIX_TIMESTAMP((created_at)), '000') as date"),
                ]);
            
		dd($status); AGRUPADOS POR DIA*/


		


		/* $status = DB::table('order_items')            
		->orderBy('created_at', 'ASC') 
		->get([
		DB::raw("CONCAT(UNIX_TIMESTAMP((created_at)), '000') as date"),
			]);
	
		dd($status);   FUNCIONA */
		
		$dateconv=[[1618322124000,108.00],[1618322186000,25.00],[1620913883000,50.00],[1620914124000,50.00],[1620914710000,30.00]];



		$aea=[[1623556800000,841.00],[1623556800000,1000.00],[1625544000000,40.00],[1628827200000,1000],[1631505600000,30.00]];








		$datetest=[[1625544000000,2294.00],[1620792000000,646.55],[1623556800000,412.79],[1623556800000,1293.10],[1623556800000,79.02],[1623556800000,210.34],[1623556800000,538.79],[1623643200000,538.79],[1623643200000,7.18],[1623643200000,7.18]
		,[1623643200000,7.18],[1623643200000,7.18],[1623643200000,7.18],[1623643200000,18.68],[1623643200000,44.54],[1623643200000,7.18],[1623643200000,9.34],[1623643200000,18.68],[1623643200000,15.80],[1623643200000,14.37]];

		$datea=[[1560951000000,49.47],[1561037400000,49.87],[1561123800000,49.69],[1561383000000,49.65],[1561469400000,48.89],[1561555800000,49.95],[1561642200000,49.94],[1561728600000,49.48],[1561987800000,50.39],[1562074200000,50.68],[1562160600000,51.1],[1562333400000,51.06],[1562592600000,50.01],[1562679000000,50.31],[1562765400000,50.81],[1562851800000,50.44],[1562938200000,50.83],[1563197400000,51.3],[1563283800000,51.13],[1563370200000,50.84],[1563456600000,51.42],[1563543000000,50.65],[1563802200000,51.81],[1563888600000,52.21],[1563975000000,52.17],[1564061400000,51.76],[1564147800000,51.94],[1564407000000,52.42],[1564493400000,52.19],[1564579800000,53.26],[1564666200000,52.11],[1564752600000,51.01],[1565011800000,48.33],[1565098200000,49.25],[1565184600000,49.76],[1565271000000,50.86],[1565357400000,50.25],[1565616600000,50.12],[1565703000000,52.24],[1565789400000,50.69],[1565875800000,50.44],[1565962200000,51.63],[1566221400000,52.59],[1566307800000,52.59],[1566394200000,53.16],[1566480600000,53.12],[1566567000000,50.66],[1566826200000,51.62],[1566912600000,51.04],[1566999000000,51.38],[1567085400000,52.25],[1567171800000,52.19],[1567517400000,51.42],[1567603800000,52.3],[1567690200000,53.32],[1567776600000,53.31],[1568035800000,53.54],[1568122200000,54.17],[1568208600000,55.9],[1568295000000,55.77],[1568381400000,54.69],[1568640600000,54.97],[1568727000000,55.17],[1568813400000,55.69],[1568899800000,55.24],[1568986200000,54.43],[1569245400000,54.68],[1569331800000,54.42],[1569418200000,55.26],[1569504600000,54.97],[1569591000000,54.71],[1569850200000,55.99],[1569936600000,56.15],[1570023000000,54.74],[1570109400000,55.21],[1570195800000,56.75],[1570455000000,56.76],[1570541400000,56.1],[1570627800000,56.76],[1570714200000,57.52],[1570800600000,59.05],[1571059800000,58.97],[1571146200000,58.83],[1571232600000,58.59],[1571319000000,58.82],[1571405400000,59.1],[1571664600000,60.13],[1571751000000,59.99],[1571837400000,60.79],[1571923800000,60.9],[1572010200000,61.65],[1572269400000,62.26],[1572355800000,60.82],[1572442200000,60.81],[1572528600000,62.19],[1572615000000,63.96],[1572877800000,64.38],[1572964200000,64.28],[1573050600000,64.31],[1573137000000,64.86],[1573223400000,65.04],[1573482600000,65.55],[1573569000000,65.49],[1573655400000,66.12],[1573741800000,65.66],[1573828200000,66.44],[1574087400000,66.78],[1574173800000,66.57],[1574260200000,65.8],[1574346600000,65.5],[1574433000000,65.44],[1574692200000,66.59],[1574778600000,66.07],[1574865000000,66.96],[1575037800000,66.81],[1575297000000,66.04],[1575383400000,64.86],[1575469800000,65.43],[1575556200000,66.39],[1575642600000,67.68],[1575901800000,66.73],[1575988200000,67.12],[1576074600000,67.69],[1576161000000,67.86],[1576247400000,68.79],[1576506600000,69.96],[1576593000000,70.1],[1576679400000,69.93],[1576765800000,70],[1576852200000,69.86],[1577111400000,71],[1577197800000,71.07],[1577370600000,72.48],[1577457000000,72.45],[1577716200000,72.88],[1577802600000,73.41],[1577975400000,75.09],[1578061800000,74.36],[1578321000000,74.95],[1578407400000,74.6],[1578493800000,75.8],[1578580200000,77.41],[1578666600000,77.58],[1578925800000,79.24],[1579012200000,78.17],[1579098600000,77.83],[1579185000000,78.81],[1579271400000,79.68],[1579617000000,79.14],[1579703400000,79.43],[1579789800000,79.81],[1579876200000,79.58],[1580135400000,77.24],[1580221800000,79.42],[1580308200000,81.08],[1580394600000,80.97],[1580481000000,77.38],[1580740200000,77.17],[1580826600000,79.71],[1580913000000,80.36],[1580999400000,81.3],[1581085800000,80.01],[1581345000000,80.39],[1581431400000,79.9],[1581517800000,81.8],[1581604200000,81.22],[1581690600000,81.24],[1582036200000,79.75],[1582122600000,80.9],[1582209000000,80.07],[1582295400000,78.26],[1582554600000,74.54],[1582641000000,72.02],[1582727400000,73.16],[1582813800000,68.38],[1582900200000,68.34],[1583159400000,74.7],[1583245800000,72.33],[1583332200000,75.68],[1583418600000,73.23],[1583505000000,72.26],[1583760600000,66.54],[1583847000000,71.33],[1583933400000,68.86],[1584019800000,62.06],[1584106200000,69.49],[1584365400000,60.55],[1584451800000,63.22],[1584538200000,61.67],[1584624600000,61.19],[1584711000000,57.31],[1584970200000,56.09],[1585056600000,61.72],[1585143000000,61.38],[1585229400000,64.61],[1585315800000,61.94],[1585575000000,63.7],[1585661400000,63.57],[1585747800000,60.23],[1585834200000,61.23],[1585920600000,60.35],[1586179800000,65.62],[1586266200000,64.86],[1586352600000,66.52],[1586439000000,67],[1586784600000,68.31],[1586871000000,71.76],[1586957400000,71.11],[1587043800000,71.67],[1587130200000,70.7],[1587389400000,69.23],[1587475800000,67.09],[1587562200000,69.03],[1587648600000,68.76],[1587735000000,70.74],[1587994200000,70.79],[1588080600000,69.64],[1588167000000,71.93],[1588253400000,73.45],[1588339800000,72.27],[1588599000000,73.29],[1588685400000,74.39],[1588771800000,75.16],[1588858200000,75.93],[1588944600000,77.53],[1589203800000,78.75],[1589290200000,77.85],[1589376600000,76.91],[1589463000000,77.39],[1589549400000,76.93],[1589808600000,78.74],[1589895000000,78.29],[1589981400000,79.81],[1590067800000,79.21],[1590154200000,79.72],[1590499800000,79.18],[1590586200000,79.53],[1590672600000,79.56],[1590759000000,79.49],[1591018200000,80.46],[1591104600000,80.83],[1591191000000,81.28],[1591277400000,80.58],[1591363800000,82.88],[1591623000000,83.36],[1591709400000,86],[1591795800000,88.21],[1591882200000,83.97],[1591968600000,84.7],[1592227800000,85.75],[1592314200000,88.02],[1592400600000,87.9],[1592487000000,87.93],[1592573400000,87.43],[1592832600000,89.72],[1592919000000,91.63],[1593005400000,90.01],[1593091800000,91.21],[1593178200000,88.41],[1593437400000,90.44],[1593523800000,91.2],[1593610200000,91.03],[1593696600000,91.03],[1594042200000,93.46],[1594128600000,93.17],[1594215000000,95.34],[1594301400000,95.75],[1594387800000,95.92],[1594647000000,95.48],[1594733400000,97.06],[1594819800000,97.72],[1594906200000,96.52],[1594992600000,96.33],[1595251800000,98.36],[1595338200000,97],[1595424600000,97.27],[1595511000000,92.85],[1595597400000,92.61],[1595856600000,94.81],[1595943000000,93.25],[1596029400000,95.04],[1596115800000,96.19],[1596202200000,106.26],[1596461400000,108.94],[1596547800000,109.67],[1596634200000,110.06],[1596720600000,113.9],[1596807000000,111.11],[1597066200000,112.73],[1597152600000,109.38],[1597239000000,113.01],[1597325400000,115.01],[1597411800000,114.91],[1597671000000,114.61],[1597757400000,115.56],[1597843800000,115.71],[1597930200000,118.28],[1598016600000,124.37],[1598275800000,125.86],[1598362200000,124.82],[1598448600000,126.52],[1598535000000,125.01],[1598621400000,124.81],[1598880600000,129.04],[1598967000000,134.18],[1599053400000,131.4],[1599139800000,120.88],[1599226200000,120.96],[1599571800000,112.82],[1599658200000,117.32],[1599744600000,113.49],[1599831000000,112],[1600090200000,115.36],[1600176600000,115.54],[1600263000000,112.13],[1600349400000,110.34],[1600435800000,106.84],[1600695000000,110.08],[1600781400000,111.81],[1600867800000,107.12],[1600954200000,108.22],[1601040600000,112.28],[1601299800000,114.96],[1601386200000,114.09],[1601472600000,115.81],[1601559000000,116.79],[1601645400000,113.02],[1601904600000,116.5],[1601991000000,113.16],[1602077400000,115.08],[1602163800000,114.97],[1602250200000,116.97],[1602509400000,124.4],[1602595800000,121.1],[1602682200000,121.19],[1602768600000,120.71],[1602855000000,119.02],[1603114200000,115.98],[1603200600000,117.51],[1603287000000,116.87],[1603373400000,115.75],[1603459800000,115.04],[1603719000000,115.05],[1603805400000,116.6],[1603891800000,111.2],[1603978200000,115.32],[1604064600000,108.86],[1604327400000,108.77],[1604413800000,110.44],[1604500200000,114.95],[1604586600000,119.03],[1604673000000,118.69],[1604932200000,116.32],[1605018600000,115.97],[1605105000000,119.49],[1605191400000,119.21],[1605277800000,119.26],[1605537000000,120.3],[1605623400000,119.39],[1605709800000,118.03],[1605796200000,118.64],[1605882600000,117.34],[1606141800000,113.85],[1606228200000,115.17],[1606314600000,116.03],[1606487400000,116.59],[1606746600000,119.05],[1606833000000,122.72],[1606919400000,123.08],[1607005800000,122.94],[1607092200000,122.25],[1607351400000,123.75],[1607437800000,124.38],[1607524200000,121.78],[1607610600000,123.24],[1607697000000,122.41],[1607956200000,121.78],[1608042600000,127.88],[1608129000000,127.81],[1608215400000,128.7],[1608301800000,126.66],[1608561000000,128.23],[1608647400000,131.88],[1608733800000,130.96],[1608820200000,131.97],[1609165800000,136.69],[1609252200000,134.87],[1609338600000,133.72],[1609425000000,132.69],[1609770600000,129.41],[1609857000000,131.01],[1609943400000,126.6],[1610029800000,130.92],[1610116200000,132.05],[1610375400000,128.98],[1610461800000,128.8],[1610548200000,130.89],[1610634600000,128.91],[1610721000000,127.14],[1611066600000,127.83],[1611153000000,132.03],[1611239400000,136.87],[1611325800000,139.07],[1611585000000,142.92],[1611671400000,143.16],[1611757800000,142.06],[1611844200000,137.09],[1611930600000,131.96],[1612189800000,134.14],[1612276200000,134.99],[1612362600000,133.94],[1612449000000,137.39],[1612535400000,136.76],[1612794600000,136.91],[1612881000000,136.01],[1612967400000,135.39],[1613053800000,135.13],[1613140200000,135.37],[1613485800000,133.19],[1613572200000,130.84],[1613658600000,129.71],[1613745000000,129.87],[1614004200000,126],[1614090600000,125.86],[1614177000000,125.35],[1614263400000,120.99],[1614349800000,121.26],[1614609000000,127.79],[1614695400000,125.12],[1614781800000,122.06],[1614868200000,120.13],[1614954600000,121.42],[1615213800000,116.36],[1615300200000,121.09],[1615386600000,119.98],[1615473000000,121.96],[1615559400000,121.03],[1615815000000,123.99],[1615901400000,125.57],[1615987800000,124.76],[1616074200000,120.53],[1616160600000,119.99],[1616419800000,123.39],[1616506200000,122.54],[1616592600000,120.09],[1616679000000,120.59],[1616765400000,121.21],[1617024600000,121.39],[1617111000000,119.9]
		,[1617197400000,122.15],[1617283800000,123],[1617629400000,125.9],[1617715800000,126.21],[1617802200000,127.9],[1617888600000,130.36],[1617975000000,133],[1618234200000,131.24],[1618320600000,134.43],[1618407000000,132.03],[1618493400000,134.5],[1618579800000,134.16],[1618839000000,134.84],[1618925400000,133.11],[1619011800000,133.5],[1619098200000,131.94],[1619184600000,134.32],[1619443800000,134.72],[1619530200000,134.39],[1619616600000,133.58],[1619703000000,133.48],[1619789400000,131.46],[1620048600000,132.54],[1620135000000,127.85],[1620221400000,128.1],[1620307800000,129.74],[1620394200000,130.21],[1620653400000,126.85],[1620739800000,125.91],[1620826200000,122.77],[1620912600000,124.97],[1620999000000,127.45],[1621258200000,126.27],[1621344600000,124.85],[1621431000000,124.69],[1621517400000,127.31],[1621603800000,125.43],[1621863000000,127.1],[1621949400000,126.9],[1622035800000,126.85],[1622122200000,125.28],[1622208600000,124.61],[1622554200000,124.28],[1622640600000,125.06],[1622727000000,123.54],[1622813400000,125.89],[1623072600000,125.9],[1623159000000,126.74],[1623245400000,127.13],[1623331800000,126.11],[1623418200000,127.35],[1623677400000,130.48],[1623763800000,129.64],[1623850200000,130.15],[1623936600000,131.79],[1624046403000,130.46]];
					/* dd($dateconv); */









		/* dd($roles); */
		/* $a =$roles*=1000;
		dd($a); */
	/* 	$text = str_replace('"', "'", $roles); */
	/* 	dd($text); */
		/* $a = $roles *1000;
		dd($roles); */
		
		/* $convert = Carbon::parse($roles)->getPreciseTimestamp(3);

		dd($convert); */
		/* $users = new User->; */
		/* dd($users); */
		/* strtotime($roles) * 1000; */



		$users =User::select(DB::raw("COUNT(*) as count"))
    	/* ->whereYear('created_at',date('Y')) */
		->whereYear('created_at', '=', '2021')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('count');
		/* dd($users);  CANTIDAD DE USUARIOS POR MES */
		/* dd($users); */
		/* whereYear('created_at', 2017)->get(); */	
		/* dd($users); */

		

		/* $user = new User();
		$timestamp = $user->created_at->timestamp;
		dd($timestamp); */


		$ventasdata = DB::table('order_items')->get();
		/* $fechas = ($ventasdata*1000);
		dd($fechas); */
		/* $titles *= 1000; */
	
		
	
		/* dd($b); */
		
	/* 	dd($ventasdata); */


		

		/* $users = DB::table('users')->get();
		dd($users);
		foreach ($users as $user) {
			dd($user->created_at,$user->name);
		} */

		
		/* foreach ($titles as $name => $title) {
			echo $title;
		} */








    	/* $months = User::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
    	$datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$users[$index];
    	} */
	/* dd($datas); */
 	return view('fechas-chart',compact('dateconv','datea','status','datetest','funciona')); 


	}
	public function OrderbarChart(){


		$orders = Order::select(DB::raw('sum(subtotal) as dtotal'))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
		/* dd(dtotal); */
				
		
		$months = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at',date('Y'))
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');
		/* dd($months); */
		$datas = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months as $index => $month) {
    		$datas[$month-1] =$orders[$index];
    	}
	
		$integerIDs = array_map('intval', $datas);
		



		// 2022

		$orders1 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months1 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2022')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas1 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months1 as $index => $month) {
    		$datas1[$month-1] =$orders1[$index];
    	}
	
		$integerID2s = array_map('intval', $datas1);

		// 2023

		$orders2 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months2 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2023')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas2 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months2 as $index => $month) {
    		$datas2[$month-1] =$orders2[$index];
    	}
	
		$integerID3s = array_map('intval', $datas2);
		/* dd($integerID3s); */
		// 2024

		$orders3 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months3 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2024')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas3 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months3 as $index => $month) {
    		$datas3[$month-1] =$orders3[$index];
    	}
	
		$integerID4s = array_map('intval', $datas3);
    	

		// 2025

		$orders4 = Order::select(DB::raw('sum(total) as dtotal'))
    	->whereYear('created_at', '=', '2025')
    	->groupBy(DB::raw("Month(created_at)"))		
    	->pluck('dtotal');
				
		
		$months4 = Order::select(DB::raw("Month(created_at) as month"))
    	->whereYear('created_at', '=', '2025')
    	->groupBy(DB::raw("Month(created_at)"))
    	->pluck('month');

		$datas4 = array(0,0,0,0,0,0,0,0,0,0,0,0); 
	
    	foreach ($months4 as $index => $month) {
    		$datas4[$month-1] =$orders4[$index];
    	}
		
		$integerID5s = array_map('intval', $datas4);




    	return view('orderbar-chart',compact('integerIDs','integerID2s','integerID3s','integerID4s','integerID5s'));

		
    }


	public function productbarChart(){

		$products = \App\Models\Product::all();
		



		/* $products = \App\Models\Product::all();
		selectRaw('product_id, SUM(quantity)')->groupBy('product_id')
		->limit(3)
    	->get()->toArray(); 
 */






		/* dd($products); */

		/* $a =  
		foreach($products as $product) {
			echo "['".$product->name."',".$product->quantity."],";
		}
		@endphp */
		/* $itemss =OrderItem::select(DB::raw("COUNT(*) as count"))
    	
    	->groupBy('product_id')
    	->pluck('count');
		dd($itemss); */


		/* 
		$orderitems = \App\Models\OrderItem::all();
		$orderitems = \App\Models\OrderItem::all(); */
		$orderitems = \App\Models\OrderItem::all();


		/* $orderitems = \App\Models\OrderItem::all()->select(DB::raw('product_id, SUM(quantity)')->groupBy('product_id')
		->get(); */
		
		/* selectRaw('product_id, SUM(quantity)')->groupBy('product_id'); */
	/* 	->limit(10) */
    	
		/* dd($orderitems); */
	/* 	->groupBy('product_id'); */
	/* 	dd($orderitems); */
       return view('productbar-chart',['products' => $products],['orderitems' => $orderitems]);
		
	   


   /*  	return view('productbar-chart'); */

		
    }
	public function productqty(){

		$products = \App\Models\Product::all();
		

	

		$orderitems = \App\Models\OrderItem::all();



		
		/* $orderi = OrderItem::select(DB::raw('sum(quantity) as qqty'))
		->groupBy('product_id')
		->get();
		dd($orderi);
 */

	/* 	->groupBy(DB::raw('product_id'))
            ->select([
                                DB::raw('sum(quantity) total_quantity'),
            ])
            -> get();
		dd($orderitems); */

		/* $qa = DB::table('order_items')
		->selectRaw('product_id, SUM(quantity)')->groupBy('product_id');
		dd($qa);
 */

	/* 	->groupBy('product_id'); */
	/* 	dd($orderitems); */
       return view('productqty-chart',['products' => $products],['orderitems' => $orderitems]);
	}

	public function productpie(){


		$orders1 = OrderItem::select(DB::raw('sum(quantity) as tqty'))
    	/* ->whereYear('created_at', '=', '2025') */
    	->groupBy(DB::raw('product_id','=','1'))	
		->limit(1)	
		->count();
    	/* ->pluck('tqty')->toJSON(); */
		/* ->toArray()*/
		/* dd($orders1); */
		$text = str_replace('"', "'", $orders1);
		/* dd($text); */


		$usetx = OrderItem::selectRaw('product_id, SUM(quantity)')->groupBy('product_id')
		->limit(3)
    	->get()->toArray(); 
		
		/* dd($usetx); */

		$text = str_replace('"', "'", $usetx);
		/*  dd($text); */

		
		$products = \App\Models\Product::all();
		$orderitems = \App\Models\OrderItem::all();
		return view('productpie-chart',compact('orders1','text','products'));
	}
	


}
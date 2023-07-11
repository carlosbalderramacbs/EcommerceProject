<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ChtController extends Controller
{
    public function index()
    {
        $users = User::select(DB::raw("COUNT(*)as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $months =User::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index=>$month)
        {
            $datas[$month]= $users[$index];
        }
        return view('chart',compact('datas'));
    }
    public function getProd()
    {
        $products = Product::select(DB::raw("COUNT(*)as count"))
        ->whereYear('created_at',date('Y'))
        ->groupBy(DB::raw("Month(created_at)"))
        ->pluck('count');
        $months =Product::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at',date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $index=>$month)
        {
            $datas[$month -1 ] = $users[$index];


            $datas[$month]= $products[$index];
        }
        return view('chart',compact('datas'));
    }
}
 
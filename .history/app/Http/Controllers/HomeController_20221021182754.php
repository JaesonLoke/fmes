<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::latest()->Paginate(5);
        $products = Product::latest()->Paginate(5);

        $avaibilitythismonth = Product::where('status','Running')->whereMonth('created_at', '=', Carbon::now())->count();
        $avaibilitythismonth = Product::where('status','Running')->whereMonth('created_at', '=', Carbon::now())->count();

        
        $charts = Product::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $charts->keys();
        $data = $charts->values();

        return view('dashboard',compact('products','reports','labels', 'data'))->with('i',(request()->input('page',1)-1)*5);
    }
}

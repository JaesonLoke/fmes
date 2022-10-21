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

        //avability
        $avaibilitythismonth = Product::where('status','Running')->whereMonth('created_at', '=', Carbon::now())->count();
        $avaibilitylastmonth = Product::where('status','Running')->whereMonth('created_at', '=', Carbon::now()->subMonth()->format('m'))->count();
        $avaibilitysum = Product::count();

        $avaibility = round(($avaibilitythismonth / $avaibilitysum)*100,2);

        $avaibilitycompare = $avaibilitylastmonth == 0 ? $avaibilitythismonth : ($avaibilitythismonth - $avaibilitylastmonth)/ $avaibilitylastmonth;
        $avaibilitycompare = round($avaibilitycompare*100,2);

        //performance
        $performancethismonth = Product::where(function ($query) {
            $query->where('created_at', '<', Carbon::now())
                  ->orWhere('created_at', '=', Carbon::now());
        })->whereMonth('created_at', '=', Carbon::now())->count();
        $performancethismonth = Product::where('status','Running')->whereMonth('created_at', '=', Carbon::now())->count();

        $performance = $performancethismonth;

        $charts = Product::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $charts->keys();
        $data = $charts->values();

        return view('dashboard',compact('products','reports','labels', 'data','avaibility','avaibilitycompare','performance'))->with('i',(request()->input('page',1)-1)*5);
    }
}

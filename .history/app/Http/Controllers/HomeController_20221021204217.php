<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use App\Models\Inventory;
use App\Models\Notification;
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
        $avaibilitythismonth = Product::where('status','Running')->count();
        $avaibilitysum = Product::count();

        $avaibility = round(($avaibilitythismonth / $avaibilitysum)*100,2);

        //performance
        $performancethismonth = Product::whereDay('due_date', '>=', Carbon::now())->count();

        $performancesum = Product::count();

        $performance = round(($performancethismonth / $performancesum)*100,2);

        //quality

        $inventoryusedsum = Notification::sum('quantity') + Report::sum('wastedquantity');

        $qualitysum = Notification::sum('quantity') / $inventoryusedsum ;

        $quality = round($qualitysum*100,2);

        //oee
        $oee = round(($avaibility + $performance + $quality),2);

        $charts = Product::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $charts->keys();
        $data = $charts->values();

        return view('dashboard',compact('products','reports','labels', 'data','avaibility','performance','quality','oee'))->with('i',(request()->input('page',1)-1)*5);
    }
}

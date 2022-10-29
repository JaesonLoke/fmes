<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use App\Models\Inventory;
use App\Models\Notification;
use App\Models\User;
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
        $users = User::where('id',auth()->name()->id);
        $reports = Report::latest()->Paginate(5);
        $products = Product::latest()->Paginate(5);
        $notifications = Notification::latest()->Paginate(5);

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

        $qualitysum = $inventoryusedsum == 0 ? 0 : Notification::sum('quantity') / $inventoryusedsum ;

        $quality = round($qualitysum*100,2);

        //oee
        $oee = round(($avaibility + $performance + $quality)/3,2);

        //bar chart
        $charts = Notification::select(DB::raw("sum(quantity) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $charts->keys();
        $data = $charts->values();

        //line chart
        $linecharts = Product::select(DB::raw("count(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('created_at','ASC')
                    ->pluck('count', 'month_name');
 
        $linelabels = $linecharts->keys();
        $linedata = $linecharts->values();

        return view('dashboard',compact('notifications','products','reports','labels', 'data','linelabels','linedata','avaibility','performance','quality','oee'))->with('i',(request()->input('page',1)-1)*5);
    }
}

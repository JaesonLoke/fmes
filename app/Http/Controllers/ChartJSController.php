<?php
  
namespace App\Http\Controllers;
    
use Illuminate\Http\Request;
use App\Models\Report;
use DB;
    
class ChartJSController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $reports = Report::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $reports->keys();
        $data = $reports->values();
              
        return view('reporting', compact('labels', 'data'));
    }
}
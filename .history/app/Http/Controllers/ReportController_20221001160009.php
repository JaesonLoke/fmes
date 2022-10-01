<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;


class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $reports = Report::latest()->Paginate(5);
        return view('pages.reporting',compact('reports'))->with('i',(request()->input('page',1)-1)*5);
     
        $reports = Report::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(created_at) as month_name"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(DB::raw("month_name"))
                    ->orderBy('id','ASC')
                    ->pluck('count', 'month_name');
 
        $labels = $reports->keys();
        $data = $reports->values();
              
        return view('reporting', compact('labels', 'data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('pages.viewReport',compact('report'));
    }

}

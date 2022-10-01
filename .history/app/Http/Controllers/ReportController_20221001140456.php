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
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Report $product)
    {
        return view('pages.product.viewproduct',compact('product'));
    }

}

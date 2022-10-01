<?php

namespace App\Http\Controllers;

use App\Models\Work;
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
 
        $reports = Report->Paginate(5);
        return view('pages.reporting',compact('reports'))->with('i',(request()->input('page',1)-1)*5);
     
    }

}

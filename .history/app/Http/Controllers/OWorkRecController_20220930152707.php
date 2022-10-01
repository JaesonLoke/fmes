<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class OWorkRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $works = Work::latest()->where('production_id', $_GET['id'])->Paginate(5);
        return view('pages.operator.operatorworkorder',compact('works'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function stop(Report $report, Work $work, Request $request)
    {
        $request->validate([
            'reason'      => 'required',
        ]);

        $report = new Report;

        $report->detail = $request->reason;
        $report->ProductOrWorkId = $work->id;
        $report->ProductOrWork = "workorder";

        $id = $work->production_id;

        $report->save();

        $work->status = "emergency";

        $work->update();

        return redirect("operator.product?id=$id")->with('emergency','One of the work order is emergency stopped');
        
    } 
}

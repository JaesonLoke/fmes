<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Report;
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
 
        $works = Work::where('production_id', $_GET['id'])->orderByRaw(
            "CASE WHEN <status = emergency> THEN < > ELSE < > END DESC"
       )->orderBy('due_date','DESC')->get();
        return view('pages.operator.operatorworkorder',compact('works'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function start(Work $work)
    {

        $work->status = "Running";

        $work->update();

        $id = $work->production_id;

        return redirect("operator.workorder?id=$id")->with('start','Work Order continue.');
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

        return redirect("operator.workorder?id=$id")->with('emergency','One of the work order is emergency stopped');
        
    } 
}

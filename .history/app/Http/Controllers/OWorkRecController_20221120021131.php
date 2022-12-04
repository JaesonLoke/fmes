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
            "CASE WHEN status like 'emergency' then '0' else 1 end"
       )->orderBy('due_date','asc')->get();
       
        return view('pages.operator.operatorworkorder',compact('works'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    public function emergency(Work $work)
    {
        return view('pages.operator.operatoremergency',compact('work'));
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
        $report->WorkId = $work->id;
        $report->category = "Emergency stop";
        $report->ReporterID = auth()->user()->id;
        $report->ProductOrWork = "workorder";
        $report->created_at = $time;
        $report->updated_at = $time;

        $id = $work->production_id;

        $report->save();

        $work->status = "emergency";

        $work->update();

        return redirect("operator.workorder?id=$id")->with('emergency','One of the work order is emergency stopped');
        
    } 
}

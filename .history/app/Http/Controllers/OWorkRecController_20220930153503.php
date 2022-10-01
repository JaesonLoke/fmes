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
 
        $works = Work::latest()->where('production_id', $_GET['id'])->Paginate(5);
        return view('pages.operator.operatorworkorder',compact('works'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function start(Product $work)
    {

        $work->status = "Running";

        Work::where('id',$work->workorder_id)->update(['status'=>'Running']);

        $work->update();

        $id = $work->workorder_id;

        return redirect("operator.work?id=$id")->with('start','Production starts.');
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

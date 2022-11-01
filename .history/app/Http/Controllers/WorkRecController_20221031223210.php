<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $works = Work::where('due_date',desc')->get();
        return view('pages.workorder.workorder',compact('works'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.workorder.creatework');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'workorder_name'      => 'required',
            'due_date'          => 'required|date|after_or_equal:' . date('Y-m-d'),
        ]);

        $work = new Work;

        $work->workorder_name = $request->workorder_name;
        $work->planner_id = auth()->user()->id;
        $work->production_id = $_GET['id'];
        $work->due_date = $request->due_date;

        $id = $_GET['id'];

        $work->save();
        
        return redirect("workorder?id=$id")->with('success','Work Order added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('pages.workorder.viewwork',compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function edit(Work $work)
    {
        return view('pages.workorder.editwork',compact('work'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        $request->validate([
            'workorder_name'      => 'required',
            'due_date'          => 'required|date|after_or_equal:now'
        ]);

        $input = $request->all();

        $work->workorder_name = $request->workorder_name;
        $work->due_date = $request->due_date;

        $work->update($input);

        $id =  $work->production_id;


        return redirect("workorder?id=$id")->with('success','Work Order updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {

        $id = $work->production_id;

        $work->delete();

        return redirect("workorder?id=$id")->with('success','Work Order deleted succesfully!');
    }
}

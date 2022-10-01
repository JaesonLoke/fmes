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
        $work->planner_id = "123";
        $work->production_id = $_GET['id'];
        $work->due_date = $request->due_date;

        $id = $_GET['id'];

        $work->save();
        
        return redirect("workorder?id=$id")->with('success','Work Order added succesfully!');
    }

    
}

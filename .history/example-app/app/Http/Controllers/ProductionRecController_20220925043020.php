<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductionRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $productions = Production::latest()->Paginate(5);
        return view('pages.production.production',compact('productions'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.production.createproduction');
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
            'production_name'      => 'required',
        ]);

        $productions = new Production;

        $productions->production_line = $request->production_name;

        $productions->save();
        
        return redirect("production")->with('success','Production added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        return view('pages.production.viewwork',compact('work'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        $work->delete();

        return redirect("workorder?id=$id")->with('success','Work Order deleted succesfully!');
    }
}

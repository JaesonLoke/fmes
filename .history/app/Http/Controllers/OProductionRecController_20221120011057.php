<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;

class OProductionRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $productions = Production::where('status','!=','deleted')->orderByRaw(
            "CASE WHEN status like 'emergency' then '0' else 1 end"
       )->orderBy('created_at','desc')->get();
        return view('pages.operator.operatorproduction',compact('productions'));
     
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

        $production = new Production;

        $production->production_line = $request->production_name;

        $production->save();
        
        return redirect("production")->with('success','Production added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function show(Production $production)
    {
        return view('pages.production.viewproduction',compact('production'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $production)
    {
        return view('pages.production.editproduction',compact('production'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function start(Production $production)
    {

        $production->status = "Running";

        $production->update();


        return redirect("operator.workorder?id=$id")->with('start','Work Order continue.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production $production
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $production)
    {
        $request->validate([
            'production_name'      => 'required',
        ]);

        $input = $request->all();

        $production->production_line = $request->production_name;

        $production->update($input);

        return redirect("production")->with('success','Production updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production  $production
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $production)
    {
        $production->delete();

        return redirect("production")->with('success','Production deleted succesfully!');
    }
}

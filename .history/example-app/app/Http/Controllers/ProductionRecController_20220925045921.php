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
     * @param  \App\Models\Production  $productions
     * @return \Illuminate\Http\Response
     */
    public function show(Production $productions)
    {
        return view('pages.production.viewproduction',compact('productions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Production $productions
     * @return \Illuminate\Http\Response
     */
    public function edit(Production $productions)
    {
        return view('pages.production.editproduction',compact('productions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Production $productions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Production $productions)
    {
        $request->validate([
            'production_name'      => 'required',
        ]);

        $input = $request->all();

        $productions->production_line = $request->production_name;

        $productions->update($input);

        return redirect("production")->with('success','Production updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Production  $productions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Production $productions)
    {
        $productions->delete();

        return redirect("production")->with('success','Production deleted succesfully!');
    }
}

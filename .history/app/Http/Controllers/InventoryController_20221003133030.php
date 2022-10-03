<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use DB;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $inventorys = Inventory::latest()->Paginate(5);
              
        return view('pages.inventory,inventory',compact('inventorys'))->with('i',(request()->input('page',1)-1)*5);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('pages.viewReport',compact('report'));
    }

}

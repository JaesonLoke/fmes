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
    public function stop(Report $report, Product $product, Request $request)
    {
        $request->validate([
            'reason'      => 'required',
        ]);

        $report = new Report;

        $report->detail = $request->reason;
        $report->ProductOrWorkId = $product->id;
        $report->ProductOrWork = "product";

        $id = $product->workorder_id;

        $report->save();

        $product->status = "emergency";

        $product->update();

        return redirect("operator.product?id=$id")->with('emergency','One of the product is emergency stopped');
        
    } 
}

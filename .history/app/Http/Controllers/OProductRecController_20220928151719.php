<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;
use Illuminate\Http\Request;

class OProductRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $products = Product::latest()->where('workorder_id', $_GET['id'])->Where('status', '!=', 'completed')->Paginate(5);
        return view('pages.operator.operatorproduct',compact('products'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function start(Product $product)
    {

        $product->status = "Running";

        $product->update();

        $id = $product->workorder_id;

        return redirect("operator.product?id=$id")->with('start','Production starts.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function end(Product $product, Request $request)
    {

        $request->validate([
            'quantity'      => 'required',
            'quantity'      => 'required',
        ]);


        $product->status = "completed";

        $product->update();

        $id = $product->workorder_id;

        return redirect("operator.product?id=$id")->with('done','Product is completed!');
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
        $report->product_id = $product->id;

        $id = $product->workorder_id;

        $report->save();

        $product->status = "emergency";

        $product->update();

        return redirect("operator.product?id=$id")->with('emergency','One of the product is emergency stopped');
        
    }
}

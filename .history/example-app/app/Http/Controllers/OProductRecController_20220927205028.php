<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function stop(Product $product)
    {

        $product->status = "emergency";

        $product->update();

        $id = $product->workorder_id;

        return redirect("operator.product?id=$id")->with('emergency','One of the product is emergency stopped');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function end(Product $product)
    {
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
    public function storefb(Request $request)
    {
        $request->validate([
            'reason'      => 'required',
        ]);

        $product = new Work;

        $work->workorder_name = $request->workorder_name;
        $work->planner_id = "123";
        $work->production_id = $_GET['id'];
        $work->due_date = $request->due_date;

        $id = $_GET['id'];

        $work->save();
        
        return redirect("workorder?id=$id")->with('success','Work Order added succesfully!');
    }
}

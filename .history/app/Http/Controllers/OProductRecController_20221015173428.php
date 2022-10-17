<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Report;
use App\Models\Work;
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

        Work::where('id',$product->workorder_id)->update(['status'=>'Running']);

        $product->update();

        $id = $product->workorder_id;

        return redirect("operator.product?id=$id")->with('start','Production starts.');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function endindex()
    {
        $inventorys = Inventory::all();
        $products = Product::all();
        return view('pages.operator.endproduct',compact('products','inventorys'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function end( Request $request)
    {

        $products = $request->input('inventorys', []);
        

        $quantities = $request->input('quantities', []);
       

        for ($product=0; $product < count($products); $product++) {
            if ($products[$product] != '') {

                $current = Inventory::where('id',$products[$product])->value('quantity');

                $new$quantities[$product]

                Inventory::where('id',$products[$product])->where(['quantity'=>'4']);
            }
        }

    }

    // $request->validate([
    //     'quantity'      => 'required',
    //     'note'      => 'required',
    // ]);


    // $product->operator_remark = $request->note;

    // $total = $product->completion + $request->quantity;
    // $product->completion = $total;

    // if($total >= $product->quantity){
    //     $product->status = "completed";

    //     $product->update();

    //     $id = $product->workorder_id;

    //     return redirect("operator.product?id=$id")->with('done','Product is completed!');
    // }else{

    //     $product->update();

    //     $id = $product->workorder_id;
        
    //     return redirect("operator.product?id=$id")->with('done','Product is updated!');
    // }

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

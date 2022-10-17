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
    public function endindex(Product $productinfo)
    {
        $inventorys = Inventory::all();
        return view('pages.operator.endproduct',compact('productinfo','inventorys'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function end(Product  $product, Request $request)
    {
        $request->validate([
        'quantity'      => 'required',
        'note'      => 'required',
        ]);

        $inventorys = $request->input('inventorys', []);
        
        $quantities = $request->input('quantities', []);
       

        for ($inventory=0; $inventory < count($inventorys); $inventory++) {
            if ($inventorys[$inventory] != '') {

                $current = Inventory::where('id',$inventorys[$inventory])->value('quantity');

                $new = $current - $quantities[$inventory];

                Inventory::where('id',$inventorys[$inventory])->update(['quantity'=>$new]);
            }
        }

        $inventoryswaste = $request->input('inventoryswaste', []);
        
        $quantitieswaste = $request->input('quantitieswaste', []);
       
        for ($inventorywaste=0; $inventorywaste < count($inventoryswaste); $inventorywaste++) {
            if ($inventoryswaste[$inventorywaste] != '') {

                $currentwaste = Inventory::where('id',$inventoryswaste[$inventorywaste])->value('quantity');

                $newwaste = $currentwaste - $quantitieswaste[$inventorywaste];

                Inventory::where('id',$inventoryswaste[$inventorywaste])->update(['quantity'=>$newwaste]);
            }
        }

            $product->operator_remark = $request->note;

                $total = $product->completion + $request->quantity;
                $product->completion = $total;

                if($total >= $product->quantity){
                    $product->status = "completed";

                    $product->update();

                    $id = $product->workorder_id;

                    return redirect("operator.product?id=$id")->with('done','Product is completed!');
                }else{

                    $product->update();

                    $id = $product->workorder_id;
                    
                    return redirect("operator.product?id=$id")->with('done','Product is updated!');
                }

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

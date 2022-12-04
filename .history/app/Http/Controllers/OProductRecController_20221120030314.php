<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\Report;
use App\Models\Notification;
use App\Models\Work;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OProductRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::where('workorder_id', $_GET['id'])->Where('status', '!=', 'completed')->orderByRaw(
            "CASE WHEN status like 'emergency' then '0' else 1 end"
       )->orderBy('due_date','asc')->get();


        return view('pages.operator.operatorproduct',compact('products'));
    }

    public function emergency(Product $product)
    {
        return view('pages.operator.operatoremergencyproduct',compact('product'));
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

        // for inventory used
        $inventorys = $request->input('inventorys', []);
        
        $quantities = $request->input('quantities', []);
       

        for ($inventory=0; $inventory < count($inventorys); $inventory++) {
            if ($inventorys[$inventory] != '') {

                $current = Inventory::where('id',$inventorys[$inventory])->value('quantity');

                $new = $current - $quantities[$inventory];

                Inventory::where('id',$inventorys[$inventory])->update(['quantity'=>$new]);

                $notification = new Notification;

                $time = Carbon::now()->toDateTimeString();

                $name = Inventory::where('id',$inventorys[$inventory])->value('inventory_name');


                $notification->detail = "$quantities[$inventory] $name is used.";
                $notification->category = "inventory";
                $notification->inventory_id = $inventorys[$inventory];
                $notification->quantity = $quantities[$inventory];
                $notification->created_at = $time;
                $notification->updated_at = $time;
                $notification->staff_id = auth()->user()->id;

                $notification->save();
            }
        }

        // for inventory wasted
        $inventoryswaste = $request->input('inventoryswaste', []);
        
        $quantitieswaste = $request->input('quantitieswaste', []);
       
        for ($inventorywaste=0; $inventorywaste < count($inventoryswaste); $inventorywaste++) {
            if ($inventoryswaste[$inventorywaste] != '') {

                $currentwaste = Inventory::where('id',$inventoryswaste[$inventorywaste])->value('quantity');

                $newwaste = $currentwaste - $quantitieswaste[$inventorywaste];

                Inventory::where('id',$inventoryswaste[$inventorywaste])->update(['quantity'=>$newwaste]);

                $report = new Report;

                $time = Carbon::now()->toDateTimeString();

                $name = Inventory::where('id',$inventoryswaste[$inventorywaste])->value('inventory_name');


                $report->detail = "$quantitieswaste[$inventorywaste] $name is wasted.";
                $report->category = "inventory waste";
                $report->inventory_id = $inventoryswaste[$inventorywaste];
                $report->wastedquantity = $quantitieswaste[$inventorywaste];
                $report->ProductId = $product->id;
                $report->ReporterId = auth()->user()->id;
                $report->WorkID = $product->workorder_id;
                $report->ProductOrWork = "product";
                $report->created_at = $time;
                $report->updated_at = $time;
                

                $report->save();
            }
        }

        // for complete production
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

        $time = Carbon::now()->toDateTimeString();

        $report->detail = $request->reason;
        $report->category = $request->reason;
        $report->ProductId = $product->id;
        $report->ReporterId = auth()->user()->id;
        $report->WorkID = $product->workorder_id;
        $report->ProductOrWork = "product";
        $report->created_at = $time;
        $report->updated_at = $time;

        $id = $product->workorder_id;

        $report->save();

        $notification = new Notification;


        $name = $work->workorder_name;

        $notification->detail = "$name is emergency stopped due to $request->reason";
        $notification->category = "Emergency stop";
        $notification->created_at = $time;
        $notification->updated_at = $time;
        $notification->work_id = $work->id;
        $notification->staff_id = auth()->user()->id;

        $notification->save();

        $product->status = "emergency";

        $product->update();

        return redirect("operator.product?id=$id")->with('emergency','One of the product is emergency stopped');
        
    }
}

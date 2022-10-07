<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as Image;
use DB;
use Carbon\Carbon;

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
              
        return view('pages.inventory.inventory',compact('inventorys'))->with('i',(request()->input('page',1)-1)*5);

    }

/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.inventory.createinventory');
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
            'inventory_name'      => 'required',
            'quantity'            => 'required',
            'image'               => 'required|image|max:500000'
        ]);
        
        $time = Carbon::now()->toDateTimeString();
        
        $image_file = $request->image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $form_date = array(
            'inventory_name' => $request->inventory_name,
            'quantity'       => $request->quantity,
            'image'          => $image,
            'updated_at'     => $time,
            'created_at'     => $time
        );

        Inventory::create($form_date);

        
        return redirect("inventory")->with('success','Inventory added succesfully!');
    }

    function fetch_image($id)
    {
        $image = Inventory::findOrFail($id);

        $image_file = Image::make($image->image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type','image/jpeg');

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        return view('pages.inventory.editinventory',compact('inventory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'inventory_name'      => 'required',
            'quantity'            => 'required',
            'image'               => 'required|image|max:500000'
        ]);

        $input = $request->all();

        $inventory->inventory_name = $request->inventory_name;
        $inventory->quantity = $request->quantity;
        $inventory->updated_at = $request->quantity;

        $product->update($input);

        $time = Carbon::now()->toDateTimeString();
        
        $image_file = $request->image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $form_date = array(
            'image'          => $image,
            'updated_at'     => $time,
            'created_at'     => $time
        );

        Inventory::create($form_date);

        $id = $product->workorder_id;

        return redirect("product?id=$id")->with('success','Product updated succesfully!');
    }
}
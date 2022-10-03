<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use APP\Images;
use Image;
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
            'quantity'      => 'required',
        ]);
        
        
        $image_file = $request->image;

        $image = Image::make($image_file);

        Response::make($image->encode('jpeg'));

        $form_date = array(
            'inventory_name' => $request->inventory_name,
            'quantity'       => $request->quantity,
            'image'          => $image
        );

        Images::create($form_date);

        
        return redirect("inventory")->with('success','Inventory added succesfully!');
    }
}

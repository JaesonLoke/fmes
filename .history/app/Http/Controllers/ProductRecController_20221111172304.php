<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductRecController extends Controller
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
        return view('pages.product.product',compact('products'));
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.product.createproduct');
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
            'product_name'      => 'required',
            'quantity'      => 'required',
            'due_date'          => 'required|date|after_or_equal:' . date('Y-m-d'),
        ]);

        $product = new Product;

        $product->product_name = $request->product_name;
        $product->quantity = $request->quantity;
        $product->completion = "0";
        $product->workorder_id = $_GET['id'];
        $product->planner_id = auth()->user()->id;
        $product->due_date = $request->due_date;

        $id = $_GET['id'];

        $product->save();
        
        return redirect("product?id=$id")->with('success','Product added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('pages.product.viewproduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.product.editproduct',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name'      => 'required',
            'due_date'          => 'required|date'
        ]);

        $input = $request->all();

        $product->product_name = $request->product_name;
        $product->due_date = $request->due_date;

        $product->update($input);

        $id = $product->workorder_id;

        return redirect("product?id=$id")->with('success','Product updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $id = $product->workorder_id;
        $productid = $product->input('id');

        
        $product->delete();

        return redirect("product?id=$id")->with('success','Product deleted succesfully!');
    }
}

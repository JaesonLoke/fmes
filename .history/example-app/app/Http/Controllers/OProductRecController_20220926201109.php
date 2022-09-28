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
 
        $products = Product::latest()->where('workorder_id', $_GET['id'])->Paginate(5);
        return view('pages.operator.operatorproduct',compact('products'))->with('i',(request()->input('page',1)-1)*5);
     
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
            'due_date'          => 'required|date|after_or_equal:' . date('Y-m-d'),
        ]);

        $product = new Product;

        $product->product_name = $request->product_name;
        $product->operator_id = "123";
        $product->completion = "0";
        $product->workorder_id = $_GET['id'];
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
    public function start(Request $request, Product $product)
    {

        dd($product)

        $product->status = "Running";

        $product->update($input);

        $id = $product->workorder_id;

        return redirect("operator.product?id=$id")->with('success','Product is running succesfully!');
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
        
        $product->delete();

        return redirect("product?id=$id")->with('success','Product deleted succesfully!');
    }
}

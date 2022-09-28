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

        return redirect("operator.product?id=$id")->with('success','Product is running succesfully!');
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
    public function destroy(Product $product)
    {
        $id = $product->workorder_id;
        
        $product->delete();

        return redirect("product?id=$id")->with('success','Product deleted succesfully!');
    }
}

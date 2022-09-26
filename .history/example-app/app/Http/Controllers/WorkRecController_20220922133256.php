<?php

namespace App\Http\Controllers;

use App\Models\Work;
use Illuminate\Http\Request;

class WorkRecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        $works = Work::latest()->where('production_id', $_GET['id'])->Paginate(5);
        return view('pages.workorder',compact('works'))->with('i',(request()->input('page',1)-1)*5);
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.creatework');
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
            'work_name'      => 'required',
            'due_date'          => 'required|date|after_or_equal:' . date('Y-m-d'),
        ]);

        $works = new Product;

        $product->work_name = $request->product_name;
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
        return view('pages.viewproduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('pages.editproduct',compact('product'));
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
            'due_date'          => 'required|date|after_or_equal:now'
        ]);

        $input = $request->all();

        $product->product_name = $request->product_name;
        $product->operator_id = "123";
        $product->completion = "0";
        $product->workorder_id = "123";
        $product->due_date = $request->due_date;

        $product->update($input);

        return redirect()->route('product')->with('success','Product updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product')->with('success','Product deleted succesfully!');
    }
}

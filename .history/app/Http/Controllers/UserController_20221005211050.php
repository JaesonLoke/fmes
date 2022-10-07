<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {

        $admins = User::latest()->where('role','1')->Paginate(5);
        $users = User::latest()->where('role','0')->Paginate(5);
        
        return view('users.adduser',compact('users','admins'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.createuser');
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
        $product->operator_id = "123";
        $product->completion = "0";
        $product->workorder_id = $_GET['id'];
        $product->due_date = $request->due_date;

        $id = $_GET['id'];

        $product->save();
        
        return redirect("product?id=$id")->with('success','Product added succesfully!');
    }



}

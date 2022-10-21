<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Report;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::latest()->Paginate(5);
        $products = Product::latest()->Paginate(5);

        return view('dashboard',compact('products','reports'))->with('i',(request()->input('page',1)-1)*5);
    }
}

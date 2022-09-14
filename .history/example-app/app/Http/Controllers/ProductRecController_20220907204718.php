<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProductRecController extends Controller
{
    if (View::exists('pages.product')) {
        //
    
    public function index() {
        $product = DB::select('select * from product');
        return view('pages.product',['product'=>$product]);
     }
    }
}

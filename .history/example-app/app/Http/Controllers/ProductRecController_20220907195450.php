<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductRecController extends Controller
{
    public function index() {
        $product = DB::select('select * from product');
        return view.p('product',['product'=>$product]);
     }
}

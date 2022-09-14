<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductRecController extends Controller
{
    public function index() {
        $product = DB::select('select * from products');
        return view('pages.product',compact('data'));
     }
}

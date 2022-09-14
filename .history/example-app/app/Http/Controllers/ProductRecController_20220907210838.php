<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App

class ProductRecController extends Controller
{
    public function index() {
        $data = DB::select('select * from product');
        return view('pages.product',['product'=>$data]);
     }
}

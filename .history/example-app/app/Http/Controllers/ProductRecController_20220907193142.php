<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductRecController extends Controller
{
    public function index() {
        $users = DB::select('select * from product');
        return view('stud_view',['users'=>$users]);
     }
}

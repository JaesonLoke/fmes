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
    public function index(User $user)
    {
        return view('users.adduser');

        $user = Product::latest()->where('workorder_id', $_GET['id'])->Where('status', '!=', 'completed')->Paginate(5);
        return view('pages.operator.operatorproduct',compact('products'))->with('i',(request()->input('page',1)-1)*5);
    }
}

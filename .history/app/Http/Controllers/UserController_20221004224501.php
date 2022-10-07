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
    public function index(User $users)
    {

        $users = User::latest()->Paginate(5);
        return view('users.adduser',compact('users'))->with('i',(request()->input('page',1)-1)*5);
    }
}

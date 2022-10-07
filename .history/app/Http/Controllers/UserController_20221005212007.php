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
            'fullname'            => 'required',
            'username'            => 'required',
            'email'               => 'required',
            'phonenum'            => 'required',
            'image'               => 'image|max:500000'
        ]);

        $input = $request->all();

        $time = Carbon::now()->toDateTimeString();

        $inventory->fullname = $request->inventory_name;
        $inventory->quantity = $request->quantity;
        $inventory->created_at = $time;
        $inventory->updated_at = $time;

        $inventory->update($input);

        $id = $inventory->id;

        if($request->image != null){

            $image_file = $request->image;

            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $form_date = array(
                'image'          => $image,
            );

            Inventory::where('id', $id)->update($form_date);
        }
    }



}

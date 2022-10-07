<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as Image;
use DB;
use Carbon\Carbon;

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
            'password'            => 'required|confirmed',
            'email'               => 'required',
            'phonenum'            => 'required',
            'image'               => 'image|max:500000'
        ]);

        $input = $request->all();

        $time = Carbon::now()->toDateTimeString();

        $admin = new User;

        $admin->fullname = $request->fullname;
        $admin->name = $request->username;
        $admin->hash::password = $request->password;
        $admin->email = $request->email;
        $admin->contactnum = $request->phonenum;
        $admin->position = $request->pos;
        $admin->desc = $request->desc;
        $admin->created_at = $time;
        $admin->updated_at = $time;

        $admin->save();

        $id = $admin->id;

        if($request->image != null){

            $image_file = $request->pic;

            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $form_date = array(
                'image'          => $image,
            );

            Inventory::where('id', $id)->update($form_date);
        }
        return redirect("user.index")->with('success','Admin updated succesfully!');
    }



}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use App\Models\Notification;
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
        $admins = User::latest()->where('role','1')->get();
        $users = User::latest()->where('role','0')->get();

        $thismonth = User::whereMonth('created_at','=',Carbon::now())->count();
        $lastmonth = User::whereMonth('created_at','=',Carbon::now()->subMonth()->format('m'))->count();

        $sum = User::count();

        $percentage = $lastmonth == 0 ? $thismonth : ($sum - $lastmonth)/ $lastmonth;

        $percentage = round($percentage*100,2);

        //performance
        $running = Product::where('status','Running')->count('id');
                
        $performancesum = $running + Product::where('status','emergency')->whereMonth('created_at', '=', Carbon::now())->whereEXISTS(function ($query) {
            $query->select("id")
                ->from('reports')
                ->whereRaw('products.id = reports.id');
        })->count();

        $performance = round(($performancesum == 0 ? $running : $running / $performancesum)*100,2);

        
        return view('users.adduser',compact('percentage','thismonth','performance','admins','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createadmin()
    {

        return view('users.createadmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createuser()
    {
        return view('users.createuser');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewadmin(User $user)
    {
        
        return view('users.viewadmin',compact('user'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function operatorviewadmin(User $user)
    {
        
        return view('pages.operator.viewadmin',compact('user'));

    }
    

    function fetch_image($id)
    {
        $image = User::findOrFail($id);

        $image_file = Image::make($image->image);

        $response = Response::make($image_file->encode('jpeg'));

        $response->header('Content-Type','image/jpeg');

        return $response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeadmin(Request $request)
    {
        $request->validate([
            'fullname'            => 'required|max:255',
            'username'            => 'required|max:50|unique:users',
            'email'            => 'required|max:50|unique:users',
            'password'            => 'required|confirmed|min:8',
            'phonenum'            => 'required',
            'image'               => 'image|max:500000'
        ]);

        $input = $request->all();

        $time = Carbon::now()->toDateTimeString();

        $admin = new User;

        $admin->fullname = $request->fullname;
        $admin->name = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->contactnum = $request->phonenum;
        $admin->position = $request->pos;
        $admin->desc = $request->desc;
        $admin->created_at = $time;
        $admin->updated_at = $time;
        $admin->role = '1';

        $admin->save();

        $id = $admin->id;

        if($request->image != null){

            $image_file = $request->image;

            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $form_date = array(
                'image'          => $image,
            );

            User::where('id', $id)->update($form_date);
        }
        return redirect("user.index")->with('success','Admin created succesfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeuser(Request $request)
    {
        $request->validate([
            'fullname'            => 'required|max:255',
            'username'            => 'required|max:50',
            'password'            => 'required|confirmed|min:4|numeric',
            'email'               => 'required|unique:users',
            'phonenum'            => 'required',
            'image'               => 'image|max:500000'
        ]);

        $input = $request->all();

        $time = Carbon::now()->toDateTimeString();

        $user = new User;

        $user->fullname = $request->fullname;
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->contactnum = $request->phonenum;
        $user->position = $request->pos;
        $user->desc = $request->desc;
        $user->created_at = $time;
        $user->updated_at = $time;
        $user->role = '0';

        $user->save();

        $id = $user->id;

        if($request->image != null){

            $image_file = $request->image;

            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $form_date = array(
                'image'          => $image,
            );

            User::where('id', $id)->update($form_date);
        }
        return redirect("user.index")->with('success','User created succesfully!');
    }


}

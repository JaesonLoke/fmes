<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\DetailRequest;
use App\Http\Requests\PicRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Response;
use Intervention\Image\Facades\Image as Image;
use DB;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        if($request->name != auth()->user()->name){
            $request->validate([
                'name'            => 'max:50|unique:users',
            ]);
        }

        if($request->name != auth()->user()->name){
            $request->validate([
                'fullname'            => 'max:250',
            ]);
        }

        if($request->email != auth()->user()->email){
            $request->validate([
                'email'            => 'unique:users',
            ]);
        }

        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_profile' => __('You are not allowed to change data for a default user.')]);
        }

        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }



    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        if (auth()->user()->id == 1) {
            return back()->withErrors(['not_allow_password' => __('You are not allowed to change the password for a default user.')]);
        }

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\DetailRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function detail(DetailRequest $request)
    {

        auth()->user()->update($request->all());

        return back()->withDetailStatus(__('Detail successfully updated.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\PicRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pic(Request $request, User $user)
    {}


            $image_file = $request->image;

            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $form_date = array(
                'image'          => $image,
            );

            $id = auth()->user()->id;

            User::where('id', $id)->update($form_date);
        

        return back()->withPicStatus(__('Profile successfully updated.'));
    }
}

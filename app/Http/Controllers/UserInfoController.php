<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{

    private $destination = 'users/';

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, []);

        if ($request->hasFile('profile_image'))
        {

            $file = $request->file('profile_image');
            $file_name = uniqid().$file->getClientOriginalName();

            $image_path = $this->destination.$file_name;
            $file->move($this->destination, $file_name);
        } else
        {
            $image_path = $this->destination.'default.jpg';
        }
        UserInfo::create([
            'user_id'=>$request->user_id,
            'bio'=>$request->bio,
            'phone_number'=>$request->phone_number,
            'profile_image'=>$image_path,
            'graduated_from'=>$request->graduated_from,
            'country'=>$request->country,
            'profession'=>$request->profession,
            'skills'=>$request->skills
        ]);
        return redirect()->back()->withMessage('Data saved Successfully');

    }


    public function show(UserInfo $userInfo)
    {
        //
    }


    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserInfo $userInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}

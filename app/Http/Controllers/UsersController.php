<?php

namespace App\Http\Controllers;

use App\UserInfo;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        if (Auth::check() and count(UserInfo::where('user_id', $this->user->id)->get() > 1))
            $this->user->completed_profile = true;
    }
    public function index($param = null)
    {
        $users = null;
        if (!$param)
        {
            $users = User::where('user_type', 'employees')->paginate(12);

        } else {
            $users = User::where('user_type', $param)->paginate(12);
            $users->each(function($user){
                $user->user_type == 'employer' ? $user->user_type = 'Client' : $user->user_type = 'Free-lancer';
            });

        }

        return view('auth.user-list', compact('users'));

    }

    public function show()
    {
        $user = Auth::user();
        return view('auth.profile', compact('user'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->withMessage('User Deleted');
    }
}

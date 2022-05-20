<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewUsers;
use Session;
use Auth;

class FrontendController extends Controller
{
    public function index(){
        return view('Frontend.master');
    }
    public function register(){
        return view('Frontend.login.registation');
    }

    public function login(){
         return view('Frontend.login.login');
    }


    public function check(Request $request)
    {
        $user_login = ViewUsers::where('email',$request->email)->first();

        if (password_verify($request->password, $user_login->password)) {
          Session::put('user_id',$user_login->id);
          Session::put('user_name', $user_login->user_name);

          return redirect(route('master'));

        } else {
            return redirect(route('user.login'));
        }
    }

    public function profile(){
        $userId = Session::get('user_id');
        $profile_id = ViewUsers::where('id',$userId)->first();
        return view('Frontend.profile.profile', compact('profile_id'));
    }

    public function logout(){
        Session::forget('user_id');
        Session::forget('user_name');

       return redirect(route('user.login'));
    }

}

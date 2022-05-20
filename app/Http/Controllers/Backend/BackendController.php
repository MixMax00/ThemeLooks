<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ViewUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BackendController extends Controller
{
    public function store(Request $request){

        $this->validate($request,[
            'user_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'max:30'],
            'date_birth' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
        ]);


        ViewUsers::create([
            'user_name' =>$request['user_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'date_birth' => $request['date_birth'],
            'city' => $request['city'],
            'country' => $request['country'],
        ]);


        return back()->with('success','Registaion Successfull!');

    }

    public function index(){

        $viewuser = ViewUsers::all();
        return view('Backend.user.view', compact('viewuser'));
    }
    public function status($id){

        $user_status = ViewUsers::find($id);
        if($user_status->status == 1){
            $user_status->status = 2;
            $user_status->save();
            return back();
        }else{
            $user_status->status = 1;
            $user_status->save();
            return back();
        }
    }


    public function update(Request $request){

        $this->validate($request,[
            'user_name' => ['required', 'string', 'max:255'],
            'date_birth' => ['required'],
            'city' => ['required'],
            'country' => ['required'],
        ]);


        ViewUsers::where('id', $request->user_id)->update([
            'user_name' =>$request['user_name'],
            'date_birth' => $request['date_birth'],
            'city' => $request['city'],
            'country' => $request['country'],
        ]);


        return back()->with('success','Registaion Update Successfull!');

    }





    public function delete($id){
        $user_status = ViewUsers::find($id);
        $user_status->delete();

        return back();
    }
    public function edit($id){

        $user_edit = ViewUsers::find($id);

        return view('Backend.user.edit', compact('user_edit'));
    }



}

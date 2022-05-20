<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gender;

class GenderController extends Controller
{
    public function index(){
        $genders = Gender::all();
        return view('Backend.Gender.index', compact('genders'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'gender_name' =>'required',
        ]);

        Gender::insert([
            'gender_name' => $request->gender_name,
        ]);

        return back()->with('success','Gender Add Successfull');
    }
}

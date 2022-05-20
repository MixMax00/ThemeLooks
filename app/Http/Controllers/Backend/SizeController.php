<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Size;


class SizeController extends Controller
{
     public function index(){
        $sizes = Size::all();
        return view('Backend.size.index', compact('sizes'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'size_name' =>'required',
        ]);

        Size::insert([
            'size_name' => $request->size_name,
        ]);

        return back()->with('success','Size Add Successfull');
    }
}

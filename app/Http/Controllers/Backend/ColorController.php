<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Color;

class ColorController extends Controller
{
    public function index(){
        $colors = Color::all();
        return view('Backend.color.index', compact('colors'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'color_name' =>'required',
        ]);

        Color::insert([
            'color_name' => $request->color_name,
        ]);

        return back()->with('success','Color Add Successfull');
    }
}

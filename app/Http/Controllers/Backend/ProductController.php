<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Color;
use App\Models\Gender;
use App\Models\Product;
use Auth;
use Str;
class ProductController extends Controller
{
    public function index(){
        $colors = Color::all();
        $sizes = Size::all();
        $genders = Gender::all();
        return view('Backend.product.index', compact('colors','sizes','genders'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'color_id' =>'required',
            'size_id' =>'required',
            'gender_id' =>'required',
            'product_name'  =>'required',
            'qty' => 'required',
            'price'  =>'required',
            'sale_price'  =>'required',
            'short_description' =>'required',
            'product_image'  =>'required',
        ]);

        $slug = Str::slug($request->product_name);
        $sku = Str::upper(Str::substr($request->product_name, 0, 3)."-".Str::random());

        if($request->hasFile('product_image')){
            $product_img = $request->file('product_image');
            $product_img_ext = $product_img->getClientOriginalExtension();
            $new_image_name = $slug."-".time().".".$product_img_ext;
            $product_image_url = public_path('storage/product/');
            $uploads = $product_img->move($product_image_url, $new_image_name);
            // return $new_image_name;

             if($uploads){
                $products = new Product();
                $products->product_name = $request->product_name;
                $products->user_id = Auth::user()->id;
                $products->slug = $slug;
                $products->sku = $sku;
                $products->short_description = $request->short_description;
                $products->price = $request->price;
                $products->sale_price = $request->sale_price;
                $products->qty = $request->qty;
                $products->description = $request->description;
                $products->other_info = $request->other_info;
                $products->product_img = $new_image_name;
                $products->gender_id = $request->gender_id;
                $products->color_id = $request->color_id;
                $products->size_id = $request->size_id;
                $products->save();
            }
        }

        return back()->with('success','Product Insert Successfuly!');




    }

    public function viewProduct(){
        $products = Product::all();
        return view('Backend.product.manage', compact('products'));
    }


    public function show($id){
        return view('Backend.product.show');
    }
    public function edit($id){
        $edits = Product::find($id);
        $colors = Color::all();
        $sizes = Size::all();
        $genders = Gender::all();
        return view('Backend.product.edit', compact('edits','colors','sizes','genders'));
    }

    public function update(Request $request){

         $this->validate($request, [
            'color_id' =>'required',
            'size_id' =>'required',
            'gender_id' =>'required',
            'product_name'  =>'required',
            'qty' => 'required',
            'price'  =>'required',
            'sale_price'  =>'required',
            'short_description' =>'required',
            'product_image'  =>'required',
        ]);

        $slug = Str::slug($request->product_name);
        $sku = Str::upper(Str::substr($request->product_name, 0, 3)."-".Str::random());

        if ($request->hasFile('product_image')) {
             $product_img_name = $request->file('product_image');
             if(!empty($product_img_name)){
                $product_img_ext = $product_img_name->getClientOriginalExtension();
                $product_new_img = Str::slug($request->product_title)."_".time().".".$product_img_ext;
                $updateUrl = public_path('storage/product/');

                $exts_img = public_path('storage/product/'.Product::find($request->product_id)->product_img);

                unlink($exts_img);

                $updateUploads = $product_img_name->move($updateUrl, $product_new_img);

                if($updateUploads){
                    Product::find($request->product_id)->update([
                        'product_name' => $request->product_name,
                        'color_id'  =>$request->color_id,
                        'size_id'  =>$request->size_id,
                        'gender_id'  =>$request->gender_id,
                        'price'    => $request->price,
                        'sale_price'    => $request->sale_price,
                        'slug'         => $slug,
                        'sku'          => $sku,
                        'qty'          => $request->qty,
                        'short_description' => $request->short_description,
                        'description'  => $request->description,
                        'other_info'        => $request->other_info,
                        'product_img' => $product_new_img,
                        'user_id'     => auth::user()->id,
                   ]);
                }

              return back()->with('success','Update Product Successfully!!');
             }
        }
        

     
    }


    public function deleteProduct($id){
        $products = Product::find($id);
        $products->delete();
        return back()->with('success','Deleted Product Successfully');
        
    }
}

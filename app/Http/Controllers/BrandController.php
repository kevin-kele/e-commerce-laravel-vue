<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function AllBrand(){
        $brands = Brand::paginate(5);
        return view('admin.brand.index',compact('brands'));
    }

    public function StoreBrand(Request $request){
         $request->validate([
            'brand_name' => 'required|unique:brands|min:5',
            'brand_image' => 'required|mimes:jpg.jpeg,png',
        ],[
            'brand_name.required'=>'veuillez entre une brand',
            'brand_image.required'=>'veuillez entre une brand',

        ]);
        $brand_image = $request->file('brand_image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location.$img_name;
        $brand_image->move($up_location,$img_name);

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,

            'created_at'=>Carbon::now()
        ]);

        return redirect()->back()->with('success','brand inserted successfull !');
    }
}

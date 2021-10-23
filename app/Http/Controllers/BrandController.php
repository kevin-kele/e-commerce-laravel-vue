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

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$request->brand_image,
            'created_at'=>Carbon::now()
        ]);
    }
}

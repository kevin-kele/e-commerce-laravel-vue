<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function AllCat(){
        // $categories = Category::latest()->paginate(5); de pluis ancien au plus recent
        $categories = Category::paginate(5);
        $trachCat = Category::onlyTrashed()->paginate(3);
        return view('admin.category.index',compact('categories','trachCat'));
    }


    public function AddCat(Request $request){
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],[
            'category_name.required'=>'veuillez entre une categories'
        ]);
        Category::insert([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()
        ]);
        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id =Auth::user()->id;
        // $category->save();
        return redirect()->back()->with('success','Category inserted successfull !');
    }

    public function Edit($id){
        $categories = Category::find($id);
       return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request ,$id){
        $validatedData = $request->validate([
            'category_name' => 'max:255',
        ]);
        Category::whereId($id)->update($validatedData);

        return redirect('/category/all')->with('success','Category modifier successfull !');
    }


    public function SoftDeleted($id){
        Category::find($id)->delete();
        return redirect()->back()->with('success','Category deleted successfull !');
    }

    public function Restore($id){
        Category::withTrashed()->find($id)->restore();

        return redirect('/category/all')->with('success','Category element restored successfull !');
    }

    public function ForcedDelete($id){
        Category::onlyTrashed()->find($id)->forceDelete();

        return redirect('/category/all')->with('error','Category element suprimer successfull !');
    }
}

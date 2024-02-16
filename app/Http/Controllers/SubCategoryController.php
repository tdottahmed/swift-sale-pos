<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class SubCategoryController extends Controller
{
    public function index(){
        $subCategorys = SubCategory::get();
        return view('subCategory.index',compact('subCategorys',));
    }

    public function create(){
        $categories = Category::all();
        return view('subCategory.create',compact('categories'));
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required',
        //     'category_id'=>'required'
        // ]);
        


        SubCategory::create([
            'uuid'=>Str::uuid(),
            'category_id'=>$request->category_id,
            'title'=>$request->title,
        ]);

        return redirect(route('subCategory.index'))->with('success','SubCategory Insert Successfully');

    }

    public function show(SubCategory $subCategory)
    {
        //
    }

     public function edit(SubCategory $subCategory){
        $categories = Category::all();
        return view('subCategory.edit',compact('subCategory','categories'));
    }

   public function update(Request $request, SubCategory $subCategory){

        // $request->validate([
        //     'title'=>'required',
        // 'category_id'=>'required'
        // ]);

         $subCategory->update([
            'title'=>$request->title,
            'category_id'=>$request->category_id,
        ]);

        return redirect(route('subCategory.index'))->with('success','SubCategory Updated Successfully');

    }

    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();

        return redirect(route('subCategory.index'))->with('success','SubCategory Deleted Successfully');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view category', ['only' => ['index']]);
        $this->middleware('permission:create category', ['only' => ['create','store']]);
        $this->middleware('permission:update category', ['only' => ['update','edit']]);
        $this->middleware('permission:delete category', ['only' => ['destroy']]);
    }


    public function index(){
        $categories = Category::get();
        return view('category.index',compact('categories'));
    }

    public function create(){
        return view('category.create');
    }

  public function store(Request $request){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        $image = $request->file('image');
        // dd($image);

        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/brand/'.$image_name));
        }


        category::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
            'image'=>$image_name,
        ]);

        return redirect(route('category.index'))->with('success','Category Insert Successfully');

    }

    public function show(category $category)
    {
        //
    }

     public function edit(category $category){

        return view('category.edit',compact('category'));
    }

   public function update(Request $request, category $category){

        // $request->validate([
        //     'title'=>'required'
        // ]);
        $image = $request->file('image');
        // $request->validate([
        //     'title'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);

         if($image){
            $path = public_path('storage/brand/'.$category->image);
            if (is_file($path)) {
        unlink($path);
    }

            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/brand/'.$image_name));
        }else{
            $image_name = $category->image;
        }


         $category->update([
            'title'=>$request->title,
            'image'=>$image_name,
        ]);

        return redirect(route('category.index'))->with('success','Category Updated Successfully');

    }

    public function destroy(category $category)
    {
        $category->delete();

        return redirect(route('category.index'))->with('success','Category Deleted Successfully');

    }
}

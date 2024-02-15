<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    public function index(){
        $brands = Brand::get();
        return view('brand.index',compact('brands'));
    }

    public function create(){
        return view('brand.create');
    }

  public function store(Request $request){

        $image = $request->file('image');
        // $request->validate([
        //     'title'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);

        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/brand/'.$image_name));
        }
        


        Brand::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
            'image'=>$image_name,
        ]);

        return redirect(route('brand.index'))->with('success','Brand Info Insert Successfully');

    }

    public function show(Brand $brand)
    {
        //
    }

     public function edit(Brand $brand){

        return view('brand.edit',compact('brand'));
    }

   public function update(Request $request, Brand $brand){

        $image = $request->file('image');
        // $request->validate([
        //     'title'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);

         if($image){
            $path = public_path('storage/brand/'.$brand->image);
            if (is_file($path)) {
        unlink($path);
    }

            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/brand/'.$image_name));
        }else{
            $image_name = $brand->image;
        }
        
         $brand->update([
            'title'=>$request->title,
            'image'=>$image_name,
        ]);

        return redirect(route('brand.index'))->with('success','Brand Updated Successfully');

    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brand.index'))->with('success','Brand Deleted Successfully');

    }
}

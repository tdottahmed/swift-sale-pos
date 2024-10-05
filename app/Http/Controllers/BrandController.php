<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:view brand', ['only' => ['index']]);
        $this->middleware('permission:create brand', ['only' => ['create','store']]);
        $this->middleware('permission:update brand', ['only' => ['update','edit']]);
        $this->middleware('permission:delete brand', ['only' => ['destroy']]);
    }
    
    public function index(){
        $brands = Brand::latest()->get();
        return view('brand.index',compact('brands'));
    }

    public function create(){
        return view('brand.create');
    }

  public function store(Request $request){

        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'brand/images');
        }
    
        Brand::create([
            'uuid'=>Str::uuid(),
            'title'=>$request->title,
            'image'=>$productImagePath,
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

        $productImagePath = null;
        if ($request->file('image')) {
            $productImagePath = uploadImage($request->file('image'), 'brand/images');
        }
        
         $brand->update([
            'title'=>$request->title,
            'image'=>$productImagePath,
        ]);

        return redirect(route('brand.index'))->with('success','Brand Updated Successfully');

    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect(route('brand.index'))->with('success','Brand Deleted Successfully');

    }
}

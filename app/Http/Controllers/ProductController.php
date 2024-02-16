<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\BarcodeType;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::get();
        return view('product.index');
    }

    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $units = Unit::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.create',compact('categories','subCategories','brands','colors','sizes','units','barcodeTypes'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        // $request->validate([
        //     'title'=>'required',
        //     'image' => 'required|mimes:png,jpg,jpeg',
        // ]);

        if($image){
            $image_name = uniqid().'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(200,250)->save(public_path('storage/organization/'.$image_name));
        }
        
        $data=[];
        $data['image_name']=$image_name;

        $data = $request->all();
        Product::create([
            'uuid'=>Str::uuid()

        ]+$data);


        return redirect(route('product.index'))->with('success','Product Info Create Successfully');
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        $colors = Color::all();
        $sizes = Size::all();
        $units = Unit::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.edit',compact('categories','subCategories','brands','colors','sizes','units','barcodeTypes','product'));
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}

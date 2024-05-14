<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.porto.index');
    }

    public function singleProduct()
    {

        // $product=Product::first('uuid',$product->uuid);
        // $relatedProduct=Product::where('category',$product->category)->get();

        $product = Product::first();
        return view('frontend.porto.product.single-product', compact('product'));
    }

    public function products()
    {
        return view('frontend.porto.product.products');
    }
}

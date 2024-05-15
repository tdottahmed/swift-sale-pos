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

    public function singleProduct(Product $product)
    {

        $product = Product::where('id', $product->id)->first();
        $relatedProduct = Product::where('category', $product->category)->get();
        return view('frontend.porto.product.single-product', compact('product'));
    }

    public function products()
    {
        $products = Product::all();
        return view('frontend.porto.product.products', compact('products'));
    }

    public function cart()
    {
        return view('frontend.porto.cart');
    }

    public function checkout()
    {
        return view('frontend.porto.checkout');
    }
}

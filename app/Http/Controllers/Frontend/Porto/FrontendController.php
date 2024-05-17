<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.porto.index');
    }

    public function singleProduct(Product $product)
    {
        $relatedProducts = Product::where('category', $product->category)->get();
        return view('frontend.porto.product.single-product', compact('product', 'relatedProducts'));
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
    public function categoryWiseProduct(Category $category)
    {
        $products = Product::where('category', $category->title)->get();
        
        return view('frontend.porto.product.category-wise',compact('products'));
    }
}

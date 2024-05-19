<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;

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

    public function cart(User $user)
    {
        $cartItems = $user->cart()->get();
        $productIds = $cartItems->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get();

        return view('frontend.porto.cart', compact('cartItems', 'products'));
    }

    public function addToCart(Request $request)
    {
        $product_id = $request->input('product_id');
        $user_id = Auth::id();

        $cart = Cart::where('user_id', $user_id)->where('product_id', $product_id)->first();

        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        }

        return response()->json(['message' => 'Product added to cart successfully.']);
    }

    public function checkout()
    {
        return view('frontend.porto.checkout');
    }
    public function categoryWiseProduct(Category $category)
    {
        $products = Product::where('category', $category->title)->get();

        return view('frontend.porto.product.category-wise', compact('products'));
    }
    public function reviewStore(Request $request)
    {
       $data = $request->except('_token');
        try {
            ProductReview::create($data);
            return redirect()->back()->with('success', 'review posted successfully!');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('success', $th->getMessage());
        }
    }
}

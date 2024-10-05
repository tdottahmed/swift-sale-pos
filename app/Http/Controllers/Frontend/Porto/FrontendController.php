<?php

namespace App\Http\Controllers\Frontend\Porto;

use App\Models\Cart;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use App\Models\ContactUs;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Http\Controllers\Controller;
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
    public function contact()
    {
        return view('frontend.porto.contact');
    }
    public function categoryWiseProduct(Category $category)
    {
        $products = Product::where('category', $category->title)->get();

        return view('frontend.porto.product.category-wise', compact('products'));
    }

    public function storeContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create([
            'uuid' => Str::uuid(),
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
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


    public function addToWishlist(Request $request){


        if(Auth::check() == false){

            session(['url.intended' => url()->previous()]);

            return response()->json([
                'status' => false
            ]);
        }

        Wishlist::updateOrCreate(
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ],
            [
                'user_id' => Auth::user()->id,
                'product_id' => $request->id,
            ]
        );

        // $wishlist = new Wishlist;
        // $wishlist->user_id = Auth::user()->id;
        // $wishlist->product_id = $request->id;

        // $wishlist->save();

       $product = Product::where('id', $request->id)->first();
       if($product == null){
        return response()->json([
            'status' => true,
            'message' => '<div class="alert alert-danger">Prodcut not found</div>'
        ]);
       }
        return response()->json([
            'status' => true,
            'message' => '<div class="alert alert-success"><strong>"'.$product->name.' "</strong>  added your wishlist</div>'
        ]);

    }


    public function wishlist(){

       $wishlists = Wishlist::where('user_id',Auth::user()->id)->with('product')->get();
       $data= [];

       $data['wishlists'] = $wishlists;

       return view('frontend.porto.wishlist', $data);
    }

    public function removeProductFormWishlist(Request $request){

        $wishlist = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->first();
        if($wishlist == null){
            session()->flash('error', 'Product already removed');

            return response()->json([

                'status' => true,
            ]);
        }else{
        Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->id)->delete();
        session()->flash('success', 'Product deleted successfully');

        return response()->json([

            'status' => true,
        ]);
        }
    }

}

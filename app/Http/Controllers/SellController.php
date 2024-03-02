<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::get();
        $products = Product::all();
        $customers = Customer::all();
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all(); 
        $categoryWiseProducts = [];

        foreach ($categories as $category) {
            $categoryWiseProducts[$category->title] = Product::where('category', $category->title)->get();
        }

        $categoryWiseProducts['All'] = $products;
        return view('pos.index', compact('products','categoryWiseProducts', 'customers', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sell $sell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sell $sell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sell $sell)
    {
        //
    }
}

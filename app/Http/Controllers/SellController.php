<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Variation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Models\ProductSell;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        $products = Product::all();
        $customers = Customer::all();
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all(); 
        $expenseCategories = ExpenseCategory::all();
        $categoryWiseProducts = [];
        foreach ($categories as $category) {
            $categoryWiseProducts[$category->title] = Product::where('category', $category->title)->get();
        }
        $categoryWiseProducts['All'] = $products;
        return view('pos.create', compact('products','categoryWiseProducts', 'customers', 'brands','expenseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
    //    try {
        $product_sku = explode(', ',$request->product_sku);
        $quantity = explode(', ', $request->product_quantity);
        $subTotal = explode(', ', $request->product_subtotal);
        $total = explode(', ', $request->product_total);
        $salesInfo = $request->only('product_sku','totalQuantity','customerId','totalAmount','totalPayableAmount');
        $data = array_merge([
            'uuid' => Str::uuid(),
            'discountedAmount' => $request->discountedAmount ?? 0,
        ], $salesInfo);
        $sale = Sell::create($data);
        foreach ($product_sku as $key => $value) {
            $variation = Variation::where('variation_sku', $value)->first(); 
            if ($variation) {
               $sellProduct =  ProductSell::create([
                    'sell_id'=>$sale->id,
                    'product_id'=>$variation->product_id,
                    'product_sku'=>$variation->variation_sku,
                    'product_name'=>$variation->product->name,
                    'quantity'=> $quantity[$key],
                    'subTotal' => $subTotal[$key],
                    'total' => $total[$key]
                ]);
            }
        }
    //     return view('pos.invoice',compact('sale'))->with('success', 'Order Stored Successfully');
    //    } catch (\Throwable $th) {
    //     // dd($th->getMessage());
    //     return redirect()->back()->with('error','Something Went Wrong');
    //    }
        
    }

    public function invoice()
    {
        return view('pos.invoice');
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

    public function singleProduct($id)
    {
        $product = Product::with('variations')->find($id);
        return response()->json($product);
    }
}

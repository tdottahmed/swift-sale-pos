<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Models\ProductSale;
use App\Models\Sale;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with('saleProduct')->latest()->get();
        return view('pos.index',compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::get();
        $products = Product::all();
        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        $expenseCategories = ExpenseCategory::all();
        $categoryWiseProducts = [];
        foreach ($categories as $category) {
            $categoryWiseProducts[$category->title] = Product::where('category', $category->title)->get();
        }
        $categoryWiseProducts['All'] = $products;
        return view('pos.create', compact('products', 'categoryWiseProducts', 'customers', 'brands', 'expenseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $salesInfos = $request->only('customer_id', 'total_price', 'paid_amount', 'total_quantity', 'discountedAmount', 'payment_type');
            
            $data = array_merge(['uuid' => Str::uuid()], $salesInfos);
            $sale = Sale::create($data);
            $productIds = $request->product_ids;
            foreach ($productIds as $key => $id) {
                ProductSale::create([
                    'sale_id' => $sale->id,
                    'product_id' => $id,
                    'variation_id' => $request->variation[$key],
                    'quantity' => $request->proQuantity[$key],
                    'unit_total' => $request->unit_price[$key],
                    'sub_total' => $request->sub_total[$key]
                ]);
            }
            return $this->invoice($sale->id)->with('success', 'Order Stored Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function invoice($id)
    {
        $sale = Sale::find($id);
        if ($sale->customer_id == 0) {
            $customersInfos = [
                'name' => 'Walked by Customer',
                'phone' => 'N/A'
            ];
        } else {
            $customer = Customer::find($sale->customer_id);
            $customersInfos = [
                'fname' => $customer->fname,
                'lname' =>$customer->lname,
                'phone' => $customer->phone
            ];
        }
        return view('pos.invoice', compact('sale', 'customersInfos'));
    }


    public function singleProduct($id)
    {
        $product = Product::with('variations')->find($id);
        return response()->json($product);
    }
}

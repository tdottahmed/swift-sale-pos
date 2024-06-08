<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductSale;
use App\Models\Sale;
use App\Models\Variation;

class SaleController extends Controller
{
    /**
     * pos index and list actions
     */
    public function __construct()
    {
        // $this->middleware('permission:view invoice', ['only' => ['index']]);
        $this->middleware('permission:create sell-invoice', ['only' => ['create','store','invoice']]);
        // $this->middleware('permission:update invoice', ['only' => ['update','edit']]);
        // $this->middleware('permission:delete invoice', ['only' => ['destroy']]);
    } 
    
    public function index()
    {
        $sales = Sale::with('saleProduct')->latest()->get();
        return view('pos.index', compact('sales'));
    }

    /**
     * Pos Create 
     */
    public function create()
    {
        $products = Product::with('variations')->latest()->get();
           
        return view('pos.create', compact('products'));
    }

    // Pos Store and calculation 

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $salesInfos = $request->only('customer_id', 'total_price', 'paid_amount', 'total_quantity', 'discountedAmount', 'payment_type');
            // dd($salesInfos);
            $data = array_merge(['uuid' => Str::uuid()], $salesInfos);
            $sale = Sale::create($data);
            $productIds = $request->product_ids;
            foreach ($productIds as $key => $id) {
                $variation_id = $request->variation_ids[$key] ?? null;
                $productSale = ProductSale::create([
                    'sale_id' => $sale->id,
                    'product_id' => $id,
                    'variation_id' => $variation_id !== 'null' ? $variation_id : null,
                    'quantity' => $request->proQuantity[$key],
                    'unit_total' => $request->unit_price[$key],
                    'sub_total' => $request->sub_total[$key]
                ]);
                if ($productSale->variation_id ==!null) {
                    $variation = Variation::find($productSale->variation_id);
                    $newVariationStock = ($variation->stock - $productSale->quantity);
                    $variation->update(['stock'=>$newVariationStock]);
                    $product = Product::find($productSale->product_id);
                    $newStock = ((int)$product->opening_stock - $productSale->quantity);
                    $product->update(['opening_stock'=>$newVariationStock]);
                }else {
                    $product = Product::find($productSale->product_id);
                    $newStock = ((int)$product->opening_stock - $productSale->quantity);
                    $product->update(['opening_stock'=>$newStock]);
                }
            }
            return $this->invoice($sale->id)->with('success', 'Order Stored Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    // Generate Invoice for Pos 
    public function invoice($id)
    {
        $sale = Sale::find($id);
        if ($sale->customer_id == 0) {
            $customersInfos = [
                'fname' => 'Walked by Customer',
                'lname' => '',
                'phone' => 'N/A'
            ];
        } else {
            $customer = Customer::find($sale->customer_id);
            $customersInfos = [
                'fname' => $customer->fname,
                'lname' => $customer->lname,
                'phone' => $customer->phone
            ];
        }
        return view('pos.invoice', compact('sale', 'customersInfos'));
    }

    // Product add to pos Card 
    public function singleProduct($productId = null, $variationId = null)
        {
            $data =[];
            if ($variationId !== null && $variationId !== 'null') {
                $variation = Variation::find($variationId);
                $data = [
                    'id'=>$variation->product_id,
                    'branch_id' => $variation->branch_id,
                    'variation_id' => $variation->id,
                    'name' => $variation->product->name,
                    'selling_price'=>$variation->selling_price
                ];
            } elseif ($productId !== null && $productId !== 'null') {
               $product = Product::find($productId);
               $data = [
                'id'=>$product->id,
                'branch_id' => $product->branch_id,
                'variation_id' => null,
                'name' => $product->name,
                'selling_price'=>$product->selling_price
            ];
            }
            return response()->json($data); 
        }
   // sale stored as suspended 
    public function suspendSale(Sale $sale)
    {
        try {
            foreach ($sale->saleProduct as $product) {
                $productVariation= Variation::find($product->variation_id);
                $updateQuantity =($product->quantity + $productVariation->stock);
                $productVariation->update(['stock'=>$updateQuantity]);
            }
            $sale->update([
                'is_suspended'=>true
            ]);
            return redirect()->back()->with('success', 'Sale marked as suspended successfully!!');
        } catch (\Throwable $th) {
           return redirect()->back()->with('error', $th->getMessage());
        }
    }

    // Suspended List
    public function suspendedList()
    {
        $sales = Sale::with('saleProduct')->where('is_suspended',true)->latest()->get();
        return view('pos.suspended',compact('sales'));
    }

    // Return Sale form pos list
    public function returnSale(Sale $sale)
    {
        try {
            foreach ($sale->saleProduct as $product) {
                $productVariation= Variation::find($product->variation_id);
                $updateQuantity =($product->quantity + $productVariation->stock);
                $productVariation->update(['stock'=>$updateQuantity]);
            }
            $sale->update([
                'is_return'=>true
            ]);
            return redirect()->back()->with('success', 'Sale marked as returned successfully!!');
        } catch (\Throwable $th) {
           return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function returnedList()
    {
        $sales = Sale::with('saleProduct')->where('is_return',true)->latest()->get();
        return view('pos.returned',compact('sales'));
    }

    public function filterProducts(Request $request)
        {
            $query = Product::query();

            if ($request->filled('category')) {
                $query->where('category', $request->category);
            }

            if ($request->filled('sku')) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'LIKE', "%{$request->sku}%")
                    ->orWhere('sku', 'LIKE', "%{$request->sku}%");
                });
            }

            if ($request->filled('brand')) {
                $query->where('brand', $request->brand);
            }
            $products = $query->get();
            return view('pos.products', compact('products'))->render();
        }

}

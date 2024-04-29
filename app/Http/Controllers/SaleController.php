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
        $products = Product::with('variations')->get();
        return view('pos.create', compact('products'));
    }

    // Pos Store and calculation 

    public function store(Request $request)
    {
        try {
            $salesInfos = $request->only('customer_id', 'total_price', 'paid_amount', 'total_quantity', 'discountedAmount', 'payment_type');
            $data = array_merge(['uuid' => Str::uuid()], $salesInfos);
            $sale = Sale::create($data);
            $productIds = $request->product_ids;
            foreach ($productIds as $key => $id) {
                $productSale = ProductSale::create([
                    'sale_id' => $sale->id,
                    'product_id' => $id,
                    'variation_id' => $request->variation[$key],
                    'quantity' => $request->proQuantity[$key],
                    'unit_total' => $request->unit_price[$key],
                    'sub_total' => $request->sub_total[$key]
                ]);
                $variation = Variation::find($productSale->variation_id);
                $newStock = ($variation->stock - $productSale->quantity);
                $variation->update(['stock'=>$newStock]);
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
    public function singleProduct($id)
    {
        $product = Product::with('variations')->find($id);
        return response()->json($product);
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
}

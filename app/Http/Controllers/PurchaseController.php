<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Category;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('purchase.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $branches = Branch::all();
        $allSuppliers = Supplier::all();
        $categories = Category::all();
        return view('purchase.create', compact('branches', 'allSuppliers', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $purchase = Purchase::create([
            'supplier_id' => $request->supplier_id ?? 1,
            'branch_id' => $request->branch_id ?? auth()->user()->branch_id,
            'date' => $request->date,
            'grand_total' => $request->total,
            'total_qty' => $request->itemqty,
            'status' => $request->status,
            'note' => $request->note,
            'order_tax' => $request->order_tax_rate,
            'total_discount' => $request->order_discount,
            'grand_total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
        ]);
        $orderItems = $request->only('product_id', 'unit_cost', 'qty', 'price', 'discount', 'tax', 'sub_total', 'product_name', 'product_sku');

        foreach ($orderItems['product_id'] as $key => $productId) {
            PurchaseItem::create([
                'purchase_id' => $purchase->id,
                'product_id' => $productId,
                'product_name' => $orderItems['product_name'][$key],
                'product_sku' => $orderItems['product_sku'][$key],
                'unit_cost' => $orderItems['unit_cost'][$key],
                'qty' => $orderItems['qty'][$key],
                'unit_cost' => $orderItems['unit_cost'][$key],
                'total' => $orderItems['sub_total'][$key],
                'discount' => $orderItems['discount'][$key] ?? 0,
                'tax' => $orderItems['tax'][$key] ?? 0,
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}

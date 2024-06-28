<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index',compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $supplier = Supplier::create($request->all());
            Contact::create([
                'uuid'             => Str::uuid(),
                "contact_type"     => 2,
                "contact_id"       => uniqid(),
                "first_name"       => $supplier->fname,
                "last_name"        => $supplier->lname,
                "mobile"           => $supplier->phone,
                "email"            => $supplier->email,
                "city"             => $supplier->city,
                "address"          => $supplier->address,
                "shipping_address" => $supplier->address
            ]);
            return redirect()->back()->with('success', 'Customer created Successfully');
        } catch (\Throwable $th) {
           dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}

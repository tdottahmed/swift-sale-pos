<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:view tax', ['only' => ['index']]);
        $this->middleware('permission:create tax', ['only' => ['create', 'store']]);
        $this->middleware('permission:update tax', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete tax', ['only' => ['destroy']]);
    } 
    public function index()
    {
        $taxes = Tax::latest()->get();
        return view('tax.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tax.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Tax::create($request->all());
            return redirect()->back()->with('success', 'Tax Inserted Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tax $tax)
    {
        return view('tax.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tax $tax)
    {
        try {
            $tax->update($request->all());
            return redirect()->route('tax.index')->with('success', 'Tax Updated Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tax $tax)
    {
        try {
            $tax->delete();
            return redirect()->route('tax.index')->with('success', 'Tax Deleted Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}

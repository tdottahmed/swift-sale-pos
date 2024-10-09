<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('permission:view customer', ['only' => ['index']]);
        $this->middleware('permission:create customer', ['only' => ['create', 'store']]);
        $this->middleware('permission:update customer', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete customer', ['only' => ['destroy']]);
    }


    public function index()
    {
        $customers = Customer::all();
        return view('customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|min:2',
            'phone'       => 'required|string',
            'email'       => 'nullable|string|email',
            'city'        => 'nullable|string',
            'address'     => 'nullable|string',
        ]);

        $fullName = $request->input('name');
        $nameParts = explode(" ", $fullName);

        if (!empty($request->fullName) && count($nameParts) > 1) {
            $fname = $nameParts[0];
            $lname = $nameParts[1];
        } else {
            $fname = $fullName;
            $lname = '';
        }
        try {
            $customer = Customer::create($request->all());

            Contact::create([
                'uuid'             => Str::uuid(),
                'contact_type'     => 2,
                'contact_id'       => uniqid(),
                'first_name'       => $fname,
                'last_name'        => $lname,
                'mobile'           => $customer->phone,
                'email'            => $customer->email,
                'city'             => $customer->city,
                'address'          => $customer->address,
                'shipping_address' => $customer->address,
            ]);
            return redirect()->back()->with('success', 'Customer created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        try {
            $customer->update($request->all());
            return redirect()->back()->with('success', 'Customer Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
            return redirect()->back()->with('success', 'Customer Deleted Successfully');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}

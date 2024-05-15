<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view payment-method', ['only' => ['index']]);
        $this->middleware('permission:create payment-method', ['only' => ['create','store']]);
        $this->middleware('permission:update payment-method', ['only' => ['update','edit']]);
        $this->middleware('permission:delete payment-method', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $paymentMethods = PaymentMethod::get();
        return view('payment-method.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment-method.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'title'=>'required'
        // ]);



        PaymentMethod::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
        ]);

        return redirect(route('payment-method.index'))->with('success', 'Payment Method Insert Successfully');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment-method.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        // $request->validate([
        //     'title'=>'required'
        // ]);

        $paymentMethod->update([
            'title' => $request->title,
        ]);

        return redirect(route('payment-method.index'))->with('success', 'Payment Method Updated Successfully');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return redirect(route('payment-method.index'))->with('success', 'Payment Method Deleted Successfully');
    }
}

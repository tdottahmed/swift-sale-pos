<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Models\PaymentMethod;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('permission:view expense', ['only' => ['index']]);
        $this->middleware('permission:create expense', ['only' => ['create','store']]);
        $this->middleware('permission:update expense', ['only' => ['update','edit']]);
        $this->middleware('permission:delete expense', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $expenses = Expense::all();
        $paymentMethods = PaymentMethod::all();
        $expenseCategories = ExpenseCategory::all();
        return view('expense.index', compact('expenses', 'expenseCategories', 'paymentMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expenseCategories = ExpenseCategory::all();
        $paymentMethods = PaymentMethod::all();

        return view('expense.create', compact('expenseCategories', 'paymentMethods'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Expense::create([
            'uuid' => Str::uuid(),
            'expense_category_id' => $request->expense_category_id,
            'payment_method_id' => $request->payment_method_id,
            'reference_no' => $request->reference_no,
            'date' => $request->date,
            'expense_for' => $request->expense_for,
            'total_amount' => $request->total_amount,
            'expense_note' => $request->expense_note,
            'payment_note' => $request->payment_note,
        ]);

        return redirect(route('expenses.index'))->with('success', 'Expense Insert Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        $expenseCategories = ExpenseCategory::all();
        $paymentMethods = PaymentMethod::all();

        return view('expense.edit', compact('expense', 'expenseCategories', 'paymentMethods'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'expense_category_id' => $request->expense_category_id,
            'payment_method_id' => $request->payment_method_id,
            'reference_no' => $request->reference_no,
            'date' => $request->date,
            'expense_for' => $request->expense_for,
            'total_amount' => $request->total_amount,
            'expense_note' => $request->expense_note,
            'payment_note' => $request->payment_note,
        ]);

        return redirect(route('expenses.index'))->with('success', 'Expense Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return redirect(route('expenses.index'))->with('success', 'Expense Deleted Successfully');
    }
}

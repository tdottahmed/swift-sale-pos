<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        $expenseCategories = ExpenseCategory::all();
        return view('expense.index', compact('expenses', 'expenseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $expenseCategories = ExpenseCategory::all();

        return view('expense.create', compact('expenseCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Expense::create([
            'expense_category_id' => $request->expense_category_id,
            'reference_no' => $request->reference_no,
            'date' => $request->date,
            'expense_for' => $request->expense_for,
            'total_amount' => $request->total_amount,
            'expense_note' => $request->expense_note,
            'payment_method' => $request->payment_method,
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
        return view('expense.edit', compact('expense', 'expenseCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $expense->update([
            'expense_category_id' => $request->expense_category_id,
            'reference_no' => $request->reference_no,
            'date' => $request->date,
            'expense_for' => $request->expense_for,
            'total_amount' => $request->total_amount,
            'expense_note' => $request->expense_note,
            'payment_method' => $request->payment_method,
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

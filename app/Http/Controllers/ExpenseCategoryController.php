<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('expense-category.index',compact('expenseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expense-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title'=>'required'
        // ]);



        ExpenseCategory::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('expense-category.index'))->with('success', 'Expense Category Insert Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('expense-category.edit', compact('expenseCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExpenseCategory $expenseCategory)
    {
        // $request->validate([
        //     'title'=>'required'
        // ]);

        $expenseCategory->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect(route('expense-category.index'))->with('success', 'Expense Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        return redirect(route('expense-category.index'))->with('success', 'Expense Category Deleted Successfully');
    }
}

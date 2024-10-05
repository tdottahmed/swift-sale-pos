<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ExpenseCategory;

class ExpenseCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view expense-category', ['only' => ['index']]);
        $this->middleware('permission:create expense-category', ['only' => ['create','store']]);
        $this->middleware('permission:update expense-category', ['only' => ['update','edit']]);
        $this->middleware('permission:delete expense-category', ['only' => ['destroy']]);
    }

    
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();
        return view('expense-category.index',compact('expenseCategories'));
    }

    public function create()
    {
        return view('expense-category.create');
    }

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

    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    public function edit(ExpenseCategory $expenseCategory)
    {
        return view('expense-category.edit', compact('expenseCategory'));
    }

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

    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        return redirect(route('expense-category.index'))->with('success', 'Expense Category Deleted Successfully');
    }
}

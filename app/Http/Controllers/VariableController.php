<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use Illuminate\Http\Request;

class VariableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $variables = Variable::latest()->get();
        return view('variables.index', compact('variables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('variables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $values = json_encode($request->values);
            Variable::create([
                'title' => $request->title,
                'values' => $values
            ]);
            return redirect()->back()->with('success', 'variation Added Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Variable $variable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Variable $variable)
    {
        return view('variables.edit', compact('variable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Variable $variable)
    {
        try {
            $values = json_encode($request->values);
            $variable->update([
                'title' => $request->title,
                'values' => $values
            ]);
            return redirect()->route('variables.index')->with('success', 'variation Added Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Variable $variable)
    {
        try {
            $variable->delete($variable);
            return redirect()->route('variables.index')->with('success', 'variation Added Successfully');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }
}

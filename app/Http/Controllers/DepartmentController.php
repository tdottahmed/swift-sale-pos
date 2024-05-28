<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view department', ['only' => ['index']]);
        $this->middleware('permission:create department', ['only' => ['create', 'store']]);
        $this->middleware('permission:update department', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete department', ['only' => ['destroy']]);
    }


    public function index()
    {
        $departments = Department::get();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required'
        ]);

        department::create([
            'uuid' => Str::uuid(),
            'title' => $request->title,
        ]);

        return redirect(route('department.index'))->with('success', 'Department Insert Successfully');
    }

    public function show(Department $department)
    {
        //
    }

    public function edit(Department $department)
    {

        return view('department.edit', compact('department'));
    }

    public function update(Request $request, Department $department)
    {

        $request->validate([
            'title' => 'required'
        ]);

        $department->update([
            'title' => $request->title,
        ]);

        return redirect(route('department.index'))->with('success', 'Department Updated Successfully');
    }

    public function destroy(Department $department)
    {
        $department->delete();

        return redirect(route('department.index'))->with('success', 'Department Deleted Successfully');
    }
}

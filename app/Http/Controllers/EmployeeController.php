<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view employee', ['only' => ['index']]);
        $this->middleware('permission:create employee', ['only' => ['create', 'store']]);
        $this->middleware('permission:update employee', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete employee', ['only' => ['destroy']]);
    }

    public function index()
    {
        $employees = Employee::with('department','role')->get();
        $roles= Role::all();
        $departments = Department::all();
        return view('employee.index', compact('employees', 'departments', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $productImagePath = null;
            if ($request->file('image')) {
                $productImagePath = uploadImage($request->file('image'), 'employees/images');
            }

            Employee::create([
                'uuid'          => Str::uuid(),
                'department_id' => $request->department_id,
                'role_id'       => 2,
                'name'          => $request->name,
                'phone_number'  => $request->phone_number,
                'email'         => $request->email,
                'dob'           => $request->dob,
                'nid'           => $request->nid,
                'address'       => $request->address,
                'city'          => $request->city,
                'country'       => $request->country,
                'staff_id'      => $request->staff_id,
                'user_name'     => $request->user_name,
                'password'      => $request->password,
                'image'         => $productImagePath,
            ]);
            return redirect()->back()->with('success', 'Employee created Successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $roles = Role::all();


        return view('employee.edit', compact('employee', 'departments', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        try {
            $productImagePath = null;
            if ($request->file('image')) {
                $productImagePath = uploadImage($request->file('image'), 'employees/images');
            }

            $employee->update([
                'department_id' => $request->department_id,
                'role_id'       => 2,
                'name'          => $request->name,
                'phone_number'  => $request->phone_number,
                'email'         => $request->email,
                'dob'           => $request->dob,
                'nid'           => $request->nid,
                'address'       => $request->address,
                'city'          => $request->city,
                'country'       => $request->country,
                'staff_id'      => $request->staff_id,
                'user_name'     => $request->user_name,
                'password'      => $request->password,
                'image'         => $productImagePath,
            ]);
            return redirect()->back()->with('success', 'Employee Updated Successfully');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect(route('employee.index'))->with('success', 'Employee Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = leave::get();
        return view('leave.index',compact('leaves',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $employees = Employee::all();
        $leaveTypes = LeaveType::all();
        return view('leave.create',compact('departments','employees','leaveTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        Leave::create([
            'uuid'=>Str::uuid(),
            'department_id'=>$request->department_id,
            // 'employee_id'=>$request->employee_id,
            'leave_type_id'=>$request->leave_type_id,
            'title'=>$request->title,
            'from'=>$request->from,
            'to'=>$request->to,
            // 'status'=>$request->status,
            'attachment'=>$request->attachment,
            'description'=>$request->description,
        ]);
        return redirect(route('leave.index'))->with('success','Leave Insert Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}

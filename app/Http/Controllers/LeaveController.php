<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LeaveController extends Controller
{
     public function __construct()
     {
         $this->middleware('permission:view leave', ['only' => ['index']]);
         $this->middleware('permission:create leave', ['only' => ['create', 'store']]);
         $this->middleware('permission:update leave', ['only' => ['update', 'edit']]);
         $this->middleware('permission:delete leave', ['only' => ['destroy']]);
     }

    public function index()
    {
        $leaves = leave::get();
        $departments = Department::all();
        $employees = Employee::all();
        $leaveTypes = LeaveType::all();

        return view('leave.index',compact('leaves', 'departments', 'employees', 'leaveTypes'));
    }

    
    public function create()
    {
      
    }

    public function store(Request $request)
    {
    $request->validate([
        'department_id' => 'required|integer',
        'leave_type_id' => 'required|integer',
        'from'          => 'required|date',
        'to'            => 'required|date|after_or_equal:from',
        'attachment'    => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx',
        'description'   => 'nullable|string',
    ]);

    $fromDate = new \DateTime($request->from);
    $toDate = new \DateTime($request->to);
    $totalDays = $toDate->diff($fromDate)->days + 1;

    $attachmentPath = null;
    if ($request->file('attachment')) {
        $attachmentPath = uploadImage($request->file('attachment'), 'leaves/images');
    }

    $userId = Auth::user()->id;

    Leave::create([
        'uuid'          => Str::uuid(),
        'department_id' => $request->department_id,
        'leave_type_id' => $request->leave_type_id,
        'from'          => $request->from,
        'to'            => $request->to,
        'total_days'    => $totalDays,
        'attachment'    => $attachmentPath,
        'description'   => $request->description,
        'created_by'    => $userId,
    ]);

    return redirect()->route('leave.index')->with('success', 'Leave application created successfully.');
}

    public function show(Leave $leave)
    {
        //
    }

    public function edit(Leave $leave)
    {
        $departments = Department::all();
        $employees = Employee::all();
        $leaveTypes = LeaveType::all();
        return view('leave.edit',compact('leave','departments','employees','leaveTypes'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'department_id' => 'required|integer',
            'leave_type_id' => 'required|integer',
            'from'          => 'required|date',
            'to'            => 'required|date|after_or_equal:from',
            'attachment'    => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx',
            'description'   => 'nullable|string',
        ]);

        $fromDate = new \DateTime($request->from);
        $toDate = new \DateTime($request->to);
        $totalDays = $toDate->diff($fromDate)->days + 1;

        $leave = Leave::findOrFail($id);

        if ($request->hasFile('attachment')) {
            if ($leave->attachment) {
                Storage::delete($leave->attachment);
            }
            $attachmentPath = uploadImage($request->file('attachment'), 'leaves/images');
        } else {
            $attachmentPath = $leave->attachment;
        }

        $leave->update([
            'department_id' => $request->department_id,
            'leave_type_id' => $request->leave_type_id,
            'from' => $request->from,
            'to' => $request->to,
            'total_days' => $totalDays,
            'attachment' => $attachmentPath,
            'description' => $request->description,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('leave.index')->with('success', 'Leave application updated successfully.');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect(route('leave.index'))->with('success', 'leave Application Deleted Successfully');
    }

    public function leavePdf(Leave $leave)
    {
        return view('leave.pdf', compact('leave'));
    }

    public function updatestatus(Request $request, Leave $leave)
    {
        $leave->status = $request->status == 1 ? 0 : 1;
        $leave->save();
        return redirect()->back();
    }


}

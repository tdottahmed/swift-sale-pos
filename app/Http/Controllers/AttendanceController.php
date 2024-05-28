<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view attendance', ['only' => ['index']]);
        $this->middleware('permission:create attendance', ['only' => ['create', 'store']]);
        $this->middleware('permission:update attendance', ['only' => ['update', 'edit']]);
        $this->middleware('permission:delete attendance', ['only' => ['destroy']]);
    }

    public function index()
    {
        $employees = Employee::all();
        $attendances = Attendance::all();
        return view('attendance.index', compact('employees', 'attendances'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
           

            Attendance::create([
                'uuid'        => Str::uuid(),
                'employee_id' => $request->employee_id,
                'date'        => $request->date,
                'check_in'    => $request->check_in,
                'check_out'   => $request->check_out,
                'note'        => $request->note
            ]);
            return redirect()->back()->with('success', 'Attendance created Successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function show(Attendance $attendance)
    {
        //
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();

        return view('attendance.edit', compact('employees', 'attendance'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        try {


            $attendance->update([
                'employee_id' => $request->employee_id,
                'date'        => $request->date,
                'check_in'    => $request->check_in,
                'check_out'   => $request->check_out,
                'note'        => $request->note
            ]);
            return redirect()->back()->with('success', 'Attendance updated Successfully');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return redirect(route('attendance.index'))->with('success', 'Attendance Deleted Successfully');
    }
}

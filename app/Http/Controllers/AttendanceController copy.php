<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;




use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    public function index()
    {

        $attendances = Attendance::all();
        return view('attendance.index', compact( 'attendances'));
    }

    public function markAttendance(Request $request)
    {
        dd($request->all());
        Log::info('Marking attendance endpoint hit');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'user_id' => 'required|exists:employees,id',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;
        $attendance->check_in = 1;
        $attendance->date = now();
        $attendance->save();

        return response()->json(['message' => 'Attendance marked successfully!']);
    }

    public function closeAttendance(Request $request)
    {
        Log::info('Closing attendance endpoint hit');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'user_id' => 'required|exists:employees,id',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;
        $attendance->check_out =  0;
        $attendance->date = now();
        $attendance->save();

        // Here you can add logic to close the attendance, such as updating an attendance record

        return response()->json(['message' => 'Attendance closed successfully!']);
    }



























    
    // public function __construct()
    // {
    //     $this->middleware('permission:view attendance', ['only' => ['index']]);
    //     $this->middleware('permission:create attendance', ['only' => ['create', 'store']]);
    //     $this->middleware('permission:update attendance', ['only' => ['update', 'edit']]);
    //     $this->middleware('permission:delete attendance', ['only' => ['destroy']]);
    // }

    // public function index()
    // {
    //     $employees = Employee::all();
    //     $attendances = Attendance::all();
    //     return view('attendance.index', compact('employees', 'attendances'));
    // }

    // public function create()
    // {
    //     //
    // }

    // public function store(Request $request)
    // {
    //     try {
           

    //         Attendance::create([
    //             'uuid'        => Str::uuid(),
    //             'user_id' => $request->user_id,
    //             'date'        => $request->date,
    //             'check_in'    => $request->check_in,
    //             'check_out'   => $request->check_out,
    //             'note'        => $request->note
    //         ]);
    //         return redirect()->back()->with('success', 'Attendance created Successfully');
    //     } catch (\Throwable $th) {
    //         dd($th);
    //         return redirect()->back()->with('error', 'Something Went Wrong');
    //     }
    // }

    // public function show(Attendance $attendance)
    // {
    //     //
    // }

    // public function edit(Attendance $attendance)
    // {
    //     $employees = Employee::all();

    //     return view('attendance.edit', compact('employees', 'attendance'));
    // }

    // public function update(Request $request, Attendance $attendance)
    // {
    //     try {


    //         $attendance->update([
    //             'user_id' => $request->user_id,
    //             'date'        => $request->date,
    //             'check_in'    => $request->check_in,
    //             'check_out'   => $request->check_out,
    //             'note'        => $request->note
    //         ]);
    //         return redirect()->back()->with('success', 'Attendance updated Successfully');
    //     } catch (\Throwable $th) {
    //         dd($th);
    //         return redirect()->back()->with('error', 'Something Went Wrong');
    //     }
    // }

    // public function destroy(Attendance $attendance)
    // {
    //     $attendance->delete();

    //     return redirect(route('attendance.index'))->with('success', 'Attendance Deleted Successfully');
    // }
}

<?php


// Auto check_out hoy jay
// app/Http/Controllers/AttendanceController.php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

use Illuminate\Support\Facades\Log;


class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::all();

        return view('attendance.index', compact('attendances'));
    }


    public function markAttendance(Request $request)
    {
        Log::info('Marking attendance endpoint hit');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;

        $attendance->check_in = 1;
        // $attendance->action = 'Mark Attendance';
        $attendance->date = now();

        $attendance->save();


        return response()->json(['message' => 'Attendance marked successfully!']);
    }

    public function closeAttendance(Request $request)
    {
        Log::info('Closing attendance endpoint hit');
        Log::info('Request data: ', $request->all());

        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $attendance = new Attendance();
        $attendance->user_id = $request->user_id;

        $attendance->check_out = 0;
        // $attendance->action = 'close Attendance';
        $attendance->date = now();
        $attendance->save();

        // Here you can add logic to close the attendance, such as updating an attendance record

        return response()->json(['message' => 'Attendance closed successfully!']);
    }
}

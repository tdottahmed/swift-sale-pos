<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon; // Make sure Carbon is included
class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'user_id',
    //     'date',
    //     'check_in',
    //     'check_out',
    // ];

    public function user()
    {
        return $this->belongsTo(User::class); // Replace 'User' with your actual user model class name
    }

    public function canCloseAttendance()
    {
        // Logic to check if current time is past 9am for the attendance date
        $currentTime = Carbon::now();
        $attendanceDate = Carbon::parse($this->date);
        return $attendanceDate->isSameDay($currentTime) && $currentTime->hour >= 9;
    }

    public function canClose()
    {
        // Implement server-side logic to check if attendance can be closed (e.g., database checks)
        // This might involve checking permissions or other business rules
        return $this->canCloseAttendance(); // Replace with your logic
    }
}

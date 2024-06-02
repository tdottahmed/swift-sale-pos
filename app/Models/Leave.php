<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function leaveTypes(){
        // return $this->hasMany(SubCategory::class, 'category_id');
        return $this->belongsTo(leaveType::class, 'leave_type_id');
    }

    public function leaveEmployees(){
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function leavedepartmens(){
        return $this->belongsTo(Department::class, 'department_id');
    }
}

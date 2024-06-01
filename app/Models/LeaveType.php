<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function LeaveTypes()
    {
        return $this->hasMany(Leave::class, 'leave_type_id');
    }
}

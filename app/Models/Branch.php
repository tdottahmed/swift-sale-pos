<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function methodName()
    {
        return $this->belongsTo(User::class, 'branch_id');
    }
}

<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }

}

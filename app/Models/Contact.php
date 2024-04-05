<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function contactType()
    {
        return $this->belongsTo(ContactType::class, 'contact_type');
    }

}

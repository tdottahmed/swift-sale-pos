<?php

namespace App\Models;

use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function contactType()
    {
        return $this->belongsTo(ContactType::class, 'contact_type_id');
    }
    public function campaign()
    {
        return $this->belongsToMany(Campaign::class);
    }

}

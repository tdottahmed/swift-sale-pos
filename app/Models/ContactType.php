<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function contact()
    {
        return $this->hasMany(Contact::class, 'contact_type');
    }
}

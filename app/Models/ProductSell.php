<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSell extends Model
{

    protected $guarded = [];
    use HasFactory;

    public function sale(){
        return $this->belongsTo(Sell::class);
    }
}

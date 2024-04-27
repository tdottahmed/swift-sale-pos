<?php

namespace App\Models;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductSale extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sales()
    {
        return $this->belongsTo(Sale::class);
    }
}

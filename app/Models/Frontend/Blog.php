<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Frontend\Comment;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function comments(){
        return $this->hasMany(Comment::class, 'blog_id');
    }

}

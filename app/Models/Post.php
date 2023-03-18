<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    //fill column
    protected $guarded = [];

    // 1 Post Belong to 1 user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // 1 Post has many comment
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    // 1 Post has many likes
    public function likes(){
        return $this->hasMany(Like::class)->where('type','post');
    }
}

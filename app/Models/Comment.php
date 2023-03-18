<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Comment extends Model
{
    use HasFactory;
    use  SoftDeletes;

    //fill column
    protected $guarded = [];


    // 1 Comment Belong to 1 user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // 1 Comment Belong to 1 post
    public function post(){
        return $this->belongsTo(Post::class);
    }

    // 1 Comment has many likes
    public function likes(){
        return $this->hasMany(Like::class)>where('type','post');;
    }
}

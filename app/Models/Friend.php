<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Friend extends Model
{
    use HasFactory;
    use  SoftDeletes;

    //fill column
    protected $guarded = [];

    // 1 friend has many 'friends' user
    public function user(){
        return $this->hasMany(User::class);
    }
}

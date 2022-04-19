<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'is_like',
    ];

    // https://readouble.com/laravel/8.x/ja/eloquent-relationships.html
    public function toUser(){
        return $this->belongsTo('\App\Models\User','to_user_id','id');
    }
}

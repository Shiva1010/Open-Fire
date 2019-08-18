<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [                     // $fillable 內都是允許「被填入值」的欄位
        'user_id', 'title', 'content',
    ];

    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}

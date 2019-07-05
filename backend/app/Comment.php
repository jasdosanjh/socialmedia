<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $appends = ['name'];
    protected $fillable = ['body'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tweet() {
        return $this->belongsTo(Tweet::class);
    }

    // linking comment model to user_name
    public function getNameAttribute()
    {
        return $this->user->name;
    }
}

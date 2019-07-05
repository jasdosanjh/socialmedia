<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // Add link for username here when i figure out how.
    protected $fillable = ['body'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tweet() {
        return $this->belongsTo(Tweet::class);
    }
}

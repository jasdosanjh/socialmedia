<?php

namespace App;
use App\Traits\Order;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Order;
    protected $fillable = ['title'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}

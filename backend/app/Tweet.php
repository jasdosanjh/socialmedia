<?php

namespace App;
use App\Traits\Order;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use Order;
    protected $fillable = ['tweet'];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body) {

        Comment::create([
            'body' => request('body'),
            'tweet_id' => $this->id
        ]);
    }
}

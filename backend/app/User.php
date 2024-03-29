<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ownsTweet(Tweet $tweet) {
        return $this->id === $tweet->user->id;
    }

    public function ownsComment(Comment $comment) {
        return $this->id === $comment->user->id;
    }

    public function getJWTIdentifier()
    {
        // Returns the primary key of the user (user id)
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        // Returns a key value array which contains any custom claims to be added to JWT.
        return [];
    }
}

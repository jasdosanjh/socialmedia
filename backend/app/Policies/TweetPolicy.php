<?php

namespace App\Policies;

use App\User;
use App\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function update(User $user, Tweet $tweet) {
        return $user->ownsTweet($tweet);
    }

    public function destroy(User $user, Tweet $tweet) {
        return $user->ownsTweet($tweet);
    }
}

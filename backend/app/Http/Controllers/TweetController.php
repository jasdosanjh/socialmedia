<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Tweet;
use App\Http\Resources\Tweet as TweetResource;
use App\Http\Requests\TweetCreateRequest;

class TweetController extends Controller
{
    public function store(TweetCreateRequest $request) {
        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user()->associate($request->user());

        $tweet->save();

        return new TweetResource($tweet);
    }
}

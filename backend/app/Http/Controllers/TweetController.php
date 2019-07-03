<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Tweet;
use App\Http\Resources\Tweet as TweetResource;
use App\Http\Requests\TweetCreateRequest;
use App\Http\Requests\UpdateTweetRequest;

class TweetController extends Controller
{
    public function index() {
        $tweets = Tweet::latestFirst()->get();
        return TweetResource::collection($tweets);
    }

    public function store(TweetCreateRequest $request) {
        $tweet = new Tweet;
        $tweet->tweet = $request->tweet;
        $tweet->user()->associate($request->user());

        $tweet->save();

        return new TweetResource($tweet);
    }

    public function show(Tweet $tweet) {
        return new TweetResource($tweet);
    }

    public function update(UpdateTweetRequest $request, Tweet $tweet) {
        $this->authorize('update', $tweet);
        $tweet->tweet = $request->get('tweet', $tweet->tweet);
        $tweet->save();
        return new TweetResource($tweet);
    }
}

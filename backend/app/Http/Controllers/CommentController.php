<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use App\Tweet;

class CommentController extends Controller
{

    public function store(StoreCommentRequest $request, Tweet $tweet) {
        $comment = new Comment;
        $comment->body = $request->body;
        $comment->user_id = $request->user_id;
        $comment->tweet_id = $request->tweet_id;

        return json_encode(["success" => $comment->save()]);
    }
}

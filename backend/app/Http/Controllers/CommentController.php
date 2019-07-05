<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Comment;
use App\Tweet;

class CommentController extends Controller
{

    public function store(StoreCommentRequest $request, Tweet $tweet) {
        $comment = new Comment;
        $comment->body = $request->body;
        // $comment->user_id = $request->user_id;
        $comment->user()->associate($request->user());
        $comment->tweet_id = $request->tweet_id;

        return json_encode(["success" => $comment->save()]);
    }

    public function show(Request $request, Tweet $tweet, Comment $comment) {
        return new CommentResource($comment);
    }

    public function update(UpdateCommentRequest $request, Tweet $tweet, Comment $comment) {
        $this->authorize('update', $comment);
        $comment->body = $request->get('body', $comment->body);
        $comment->save();
        return new CommentResource($comment);
    }

    public function destroy(Tweet $tweet, Comment $comment) {
        $this->authorize('destroy', $comment);
        $comment->delete();
        return response(null, 204);
    }
}

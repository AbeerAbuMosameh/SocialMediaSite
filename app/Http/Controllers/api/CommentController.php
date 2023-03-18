<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Response;


class CommentController extends Controller
{

    public function index()
    {
        $comments = Comment::get();
        return apiResponse($comments, 'Successes', true, 200);
    }

    public function show($id)
    {
        $comment = Comment::find($id);

        if ($comment) {
            return apiResponse($comment, 'Successes', true, 200);

        }
        return apiResponse($comment, 'Comment Not Found', false, 400);

    }

    public function store(CreateRequest $request)
    {
        $comment = Comment::create($request->all());
        if ($comment) {
            return apiResponse($comment, 'Comment Saved', true, 201);
        }

        return apiResponse(null, 'Comment Not Saved', false, 404);
    }

    public
    function update(UpdateRequest $request, $id)
    {

        $comment = Comment::find($id);
        if (!$comment) {
            return apiResponse($comment, 'Comment Not Found', false,404);
        }
        if ($comment['user_id'] == $request['user_id']) {
            $comment->update($request->all());
            if ($comment) {
                return apiResponse($comment, 'Comment Updated', true,201);
            }
        } else {
            return apiResponse($comment, 'Comment Not updated', false,404);

        }
    }

    public
    function destroy($id)
    {

        $comment = Comment::find($id);

        if (!$comment) {
            return apiResponse($comment, 'Comment Not Found', false,404);
        }

        $comment->delete($id);

        if ($comment) {
            return apiResponse(null, 'Comment deleted', true,200);
        }

    }
}

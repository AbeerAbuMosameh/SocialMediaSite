<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\CreateRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::get();
        return apiResponse($posts, 'Successes', true,200);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if ($post) {
            return apiResponse($post, 'Successes', true,200);
        }
        return apiResponse($post, 'Post Not Found', false,400);

    }

    public function store(CreateRequest $request)
    {
        $post = Post::create($request->all());
        if ($post) {
            return apiResponse($post, 'Post Saved', true,201);
        }
        return apiResponse(null, 'Post Not Saved', false,404);
    }

    public function update(UpdateRequest $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return apiResponse($post, 'Post Not Found', false,404);
        }
        if ($post['user_id'] == $request['user_id']) {
            $post->update($request->all());
            if ($post) {
                return apiResponse($post, 'Post Updated', true,201);
            }
        } else {
            return apiResponse($post, 'Post Not updated', false,404);

        }
    }

    public function destroy($id)
    {

        $post = Post::find($id);

        if (!$post) {
            return apiResponse($post, 'Post Not Found', false,404);
        }

        $post->delete($id);

        if ($post) {
            return apiResponse(null, 'Post deleted', true,200);
        }

    }
}

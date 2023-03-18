<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateRequest;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LikeController extends Controller
{

    public function index()
    {
        $likes = Like::get();
        return apiResponse($likes, 'Successes', true, 200);
    }

    public function show($id)
    {
        $like = Like::find($id);

        if ($like) {
            return apiResponse($like, 'Successes', true,200);
        }
        return apiResponse($like, 'Like Not Found', false,400);
    }

    public function store(\App\Http\Requests\Like\CreateRequest $request)
    {

        $like = Like::create($request->all());
        if ($like) {
            return apiResponse($like, 'Like Saved', true, 201);
        }
        return apiResponse(null, 'Like Not Saved', false, 404);
    }

    public function destroy($id)
    {

        $like = Like::find($id);

        if (!$like) {
            return apiResponse($like, 'Like Not Found', false,404);
        }

        $like->delete($id);

        if ($like) {
            return apiResponse(null, 'The Like deleted', true,200);
        }

    }
}

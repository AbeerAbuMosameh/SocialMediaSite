<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('Post')->get();
        return view('admin.comments.index', compact('comments'));
    }


    public function create()
    {
        return view('admin.comments.create');
    }


    public function store(Request $request)
    {
        try {
            $request['user_id'] = 5 ;
            Comment::create($request->all());

            return redirect()->back()->with('success', 'Data saved successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function show(Comment $Comment)
    {
        //
    }


    public function edit($id)
    {
        $comment = Comment::findorFail($id);
        return view('admin.comments.edit', compact('comment'));
    }


    public function update(CommentRequest $request, $id)
    {

        try {
            $comment = Comment::findorFail($id);

            $comment->update($request->all());

            return redirect()->back()->with('edit', 'Data Updated successfully');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }


    public function destroy($id)
    {
        try {

            Comment::destroy($id);
            return redirect()->back()->with('delete', 'Data has been deleted successfully');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

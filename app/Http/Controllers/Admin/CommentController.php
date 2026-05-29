<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::with(['user', 'product'])->latest()->get();

        return view('admin.comment.index', ['data' => $data]);
    }

    public function approve($id)
    {
        $comment = Comment::find($id);
        $comment->status = 'approved';
        $comment->save();

        return redirect()->route('admin.comment.index')->with('success', 'Comment approved.');
    }

    public function destroy($id)
    {
        Comment::find($id)->delete();

        return redirect()->route('admin.comment.index')->with('success', 'Comment deleted.');
    }
}

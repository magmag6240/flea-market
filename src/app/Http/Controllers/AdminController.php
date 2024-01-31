<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_top');
    }

    public function user_list(Request $request, $item_id)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
            'comments' => $request->input('comments')
        ]);
        return redirect()->route('user.comment', ['item_id' => $item_id]);
    }

    public function user_destroy($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function user_comment_list($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function comment_destroy($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function mail($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function mail_send($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }
}

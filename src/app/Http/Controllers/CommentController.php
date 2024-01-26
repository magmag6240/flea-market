<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($item_id)
    {
        $item_detail = Item::where('id', $item_id)->first();
        $comment_history = Comment::where('item_id', $item_id)->with('user')->get();
        foreach($comment_history as $comment_user) {
            $user_profile = Profile::where('user_id', $comment_user->user_id)->first();
        }
        return view('comment', compact('item_detail', 'comment_history', 'user_profile'));
    }

    public function comment_store(Request $request)
    {
        Comment::create([
        ]);
        return redirect()->route('user.mypage');
    }
}

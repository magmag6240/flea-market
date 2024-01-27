<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($item_id)
    {
        $item_detail = Item::where('id', $item_id)->first();
        $comment_history = Comment::where('item_id', $item_id)->get();
        if( $comment_history->isEmpty() ) {
            return view('comment', compact('item_detail', 'comment_history'));
        } else {
            $user_id = Auth::id();
            foreach($comment_history as $comment_user) {
                $user_profile = Profile::where('user_id', $comment_user->user_id)->first();
                return view('comment', compact('user_id', 'item_detail', 'comment_history', 'user_profile'));
            }
        }
    }

    public function comment_store(Request $request, $item_id)
    {
        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
            'comments' => $request->input('comments')
        ]);
        return redirect()->route('user.comment', ['item_id' => $item_id]);
    }

    public function comment_destroy($comment_id)
    {
        $user_id = Auth::id();
        $comment = Comment::where('user_id', $user_id)->where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Item;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index($item_id)
    {
        $item_detail = Item::where('id', $item_id)->first();
        return view('comment', compact('item_detail'));
    }

    public function comment_store(Request $request)
    {
        Comment::create([
        ]);
        return redirect()->route('user.mypage');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\AdminEmail;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function user_list()
    {
        $users = User::with('comments')->paginate(20);
        return view('admin_user_list', compact('users'));
    }

    public function user_destroy($user_id)
    {
        $user = User::find($user_id);
        $user->delete();
        return redirect()->back();
    }

    public function user_comment_list(Request $request, $user_id)
    {
        $comments = Comment::where('user_id', $user_id)->with('item')->get();
        return view('admin_user_comment_list', compact('comments'));
    }

    public function comment_destroy($comment_id)
    {
        $comment =Comment::where('id', $comment_id)->first();
        $comment->delete();
        return redirect()->back();
    }

    public function mail($user_id)
    {
        $user = User::find($user_id);
        return view('admin_mail', compact('user'));
    }

    public function mail_send(Request $request, $user_id)
    {
        $user = User::where('id', $user_id)->first();
        $contents = $request['contents'];
        Mail::to($user->email)
            ->send(new AdminEmail($contents));
        return view('admin_mail_done');
    }
}

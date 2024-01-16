<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage');
    }

    public function mylist()
    {
        $user_id = Auth::id();
        $like_items = Like::where('user_id', $user_id)->get();
        return view('mylist', compact('like_items'));
    }

    public function profile_edit()
    {
        return view('profile_edit');
    }

    public function profile_update()
    {
        return view('');
    }
}

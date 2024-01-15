<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
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
        $like_products = Like::where('user_id', $user_id)->get();
        return view('mylist', compact('like_products'));
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

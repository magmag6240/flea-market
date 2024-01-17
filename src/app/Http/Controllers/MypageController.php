<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user_item = Item::where('seller_id', $user_id)->get();
        return view('mypage', compact('user_item'));
    }

    public function mylist()
    {
        $user_id = Auth::id();
        $like_items = Like::where('user_id', $user_id)->get();
        return view('mylist', compact('like_items'));
    }

    public function profile_edit(Request $request)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        return view('profile_edit', compact('user_profile'));
    }

    public function profile_update(Request $request)
    {
        $user_id = Auth::id();
        $user_detail = $request->input('image_url', 'user_name', 'post_code', 'address', 'building');
        Profile::where('user_id', $user_id)->update($user_detail);
        return redirect()->route('user.mypage');
    }
}

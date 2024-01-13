<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        return view('mypage');
    }

    public function top_mylist()
    {
        return view('top_mylist');
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

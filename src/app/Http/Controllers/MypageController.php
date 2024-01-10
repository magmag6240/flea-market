<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index()
    {
        return view('index');
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

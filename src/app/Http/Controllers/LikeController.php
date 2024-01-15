<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function like(Request $request, $product_id)
    {
        if(Auth::check()) {
            Like::create([
                'product_id' => $product_id,
                'user_id' => Auth::id()
            ]);
            return back();
        } else {
            Like::create([
                'product_id' => $product_id,
                'ip' => $request->ip()
            ]);
            return back();
        }
    }

    public function unlike(Request $request, $product_id)
    {
        if(Auth::check()) {
            $user_id = Auth::id();
            $like = Like::where('product_id', $product_id)->where('user_id', $user_id)->first();
            $like->delete();
            return back();
        } else {
            $ip = $request->ip();
            $like = Like::where('product_id', $product_id)->where('ip', $ip)->first();
            $like->delete();
            return back();
        }
    }
}

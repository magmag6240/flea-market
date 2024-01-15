<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Like;

class LikeController extends Controller
{
    public function like($product_id)
    {
        Like::create([
            'product_id' => $product_id,
            'user_id' => Auth::id()
        ]);
        return back();
    }

    public function unlike($product_id)
    {
        $user_id = Auth::id();
        $like = Like::where('product_id', $product_id)->where('user_id', $user_id)->first();
        $like->delete();
        return back();
    }
}

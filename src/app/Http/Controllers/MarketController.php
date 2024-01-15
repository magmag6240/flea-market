<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function top()
    {
        if(Auth::check()) {
            $recommend_products = Product::all();
            return view('recommend', compact('recommend_products'));
        } else {
            $recommend_products = Product::all();
            return view('recommend', compact('recommend_products'));
        }
    }

    public function sell()
    {
        return view('sell');
    }

    public function purchase()
    {
        return view('purchase');
    }

    public function address_edit()
    {
        return view('address_edit');
    }

    public function address_update()
    {
        return view('');
    }

    public function item_detail()
    {
        return view('item_detail');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function top()
    {
        $recommend_item = Product::all();
        $mylist_item = Product::all();
        return view('top', compact('recommend_item', 'mylist_item'));
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

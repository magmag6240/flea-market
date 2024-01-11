<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function top()
    {
        return view('top');
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

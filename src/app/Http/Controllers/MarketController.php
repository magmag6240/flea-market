<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function top()
    {
        if(Auth::check()) {
            $recommend_items = Item::all();
            return view('recommend', compact('recommend_items'));
        } else {
            $recommend_items = Item::all();
            return view('recommend', compact('recommend_items'));
        }
    }

    public function sell()
    {
        return view('sell');
    }

    public function sell_store(Request $request)
    {
        Item::create([
            'name' => $request->input('item_name'),
            'seller_id' => Auth::id(),
            'condition_id' => $request->input('condition'),
            'bland_name' => $request->input('bland_name'),
            'price' => $request->input('price'),
            'item_detail' => $request->input('item_detail'),
            'image_url' => $request->input('image_url')
        ]);
        return redirect()->route('user.mypage');
    }

    public function purchase($item_id)
    {
        $user_id = Auth::id();
        $item = Item::where('item_id', $item_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        return view('purchase', compact('item', 'profile'));
    }

    public function purchase_store(Request $request, $item_id, $buyer_id)
    {
        Item::find('id', $item_id)->update([
            'payment_id' => $request->input('payment_id'),
            'buyer_id' => $buyer_id
        ]);
        return redirect()->route('user.mypage');
    }

    public function address_edit(Request $request, $item_id)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        return view('address_edit', compact('user_profile', 'item_id'));
    }

    public function address_update(Request $request, $item_id)
    {
        $user_id = Auth::id();
        $new_address = $request->input('postcode', 'address', 'building');
        Profile::find('user_id', $user_id)->update($new_address);
        return redirect()->route('user.purchase', ['item_id' => $item_id]);
    }

    public function item_detail($item_id)
    {
        $item_detail = Item::where('id', $item_id)->first();
        return view('item_detail', compact('item_detail'));
    }
}

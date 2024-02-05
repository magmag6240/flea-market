<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function top()
    {
        $items = Item::whereNull('buyer_id')->with('categories')->get();
        return view('recommend', compact('items'));
    }

    public function sell()
    {
        $category = Category::all();
        $condition = Condition::all();
        return view('sell', compact('category', 'condition'));
    }

    public function sell_store(ItemRequest $request)
    {
        $image = $request->file('item_image');
        $path = '';
        if (isset($image)) {
            $path = $image->store('item', 'public');
        }

        Item::create([
            'name' => $request->input('name'),
            'seller_id' => Auth::id(),
            'condition_id' => $request->input('condition_id'),
            'brand_name' => $request->input('brand_name'),
            'price' => $request->input('price'),
            'item_detail' => $request->input('item_detail'),
            'image_url' => $path
        ]);

        foreach(array($request->input('category_id')) as $categories) {
            $categories_item = Item::where('seller_id', Auth::id())->latest()->first();
            $categories_item->categories()->attach($categories);
        }

        return redirect()->route('user.mypage');
    }

    public function purchase($item_id)
    {
        $user_id = Auth::id();
        $item = Item::where('id', $item_id)->first();
        $profile = Profile::where('user_id', $user_id)->first();
        return view('purchase', compact('item', 'profile'));
    }

    public function purchase_store($item_id)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        $user_payment_id = $user_profile->payment_id;
        $buy_item = Item::where('id', $item_id)->first();
        $buy_item->update([
            'payment_id' => $user_payment_id,
            'buyer_id' => Auth::id()
        ]);
        return redirect()->route('user.mypage');
    }

    public function item_detail($item_id)
    {
        $item_detail = Item::where('id', $item_id)->with('categories')->first();
        $item_seller_id = $item_detail->seller_id;
        $item_buyer_id = $item_detail->buyer_id;
        return view('item_detail', compact('item_detail', 'item_seller_id', 'item_buyer_id'));
    }
}

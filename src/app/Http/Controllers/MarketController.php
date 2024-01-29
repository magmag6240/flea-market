<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketController extends Controller
{
    public function top()
    {
        if(Auth::check()) {
            $user_id = Auth::id();
            $purchase_item_history = Item::where('buyer_id', $user_id)->with('categories')->get();
            if($purchase_item_history->isEmpty()) {
                $items = Item::get();
                $recommend_items = Category::withCount('items')->orderBy('items_count', 'desc')->get();
                return view('recommend', compact('items', 'recommend_items'));
            } else {
                foreach ($purchase_item_history->categories as $category) {
                    $recommend_items = Category::where('id', $category->id)->with('items')->get();
                    return view('recommend', compact('recommend_items'));
                }
            }
        } else {
            $items = Item::get();
            $recommend_items = Category::withCount('items')->orderBy('items_count', 'desc')->get();
            return view('recommend', compact('items', 'recommend_items'));
        }
    }

    public function sell()
    {
        $category = Category::all();
        $condition = Condition::all();
        return view('sell', compact('category', 'condition'));
    }

    public function sell_store(Request $request)
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

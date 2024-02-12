<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Item;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MarketController extends Controller
{
    public function top()
    {
        $items = Item::whereNull('buyer_id')->with('categories')->get();
        $all_items = Item::all();
        return view('recommend', compact('items', 'all_items'));
    }

    public function sell()
    {
        $category = Category::all();
        $condition = Condition::all();
        return view('sell', compact('category', 'condition'));
    }

    public function sell_store(ItemRequest $request)
    {
        $image_file = $request->image_url;
        $file_name = uniqid(rand() . '_');
        $extension = $image_file->extension();
        $file_name_store = $file_name . '.' . $extension;
        $resized_image = Image::make($image_file)->resize(300, 300)->encode();
        Storage::put('public/items/' . $file_name_store, $resized_image);

        Item::create([
            'name' => $request->input('name'),
            'seller_id' => Auth::id(),
            'condition_id' => $request->input('condition_id'),
            'brand_name' => $request->input('brand_name'),
            'price' => $request->input('price'),
            'item_detail' => $request->input('item_detail'),
            'image_url' => $file_name_store
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
        $profile = Profile::where('user_id', $user_id)->with('payment')->first();
        if(empty($profile)) {
            return view('profile_create');
        } else {
            return view('purchase', compact('item', 'profile'));
        }
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

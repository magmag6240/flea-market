<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Like;
use App\Models\Item;
use App\Models\Payment;
use App\Models\Profile;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MypageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        $sell_item = Item::where('seller_id', $user_id)->get();
        $purchase_item = Item::where('buyer_id', $user_id)->get();
        return view('mypage', compact('user_profile', 'sell_item', 'purchase_item'));
    }

    public function mylist()
    {
        $user_id = Auth::id();
        $like_items = Like::where('user_id', $user_id)->with('item')->get();
        return view('mylist', compact('like_items'));
    }

    public function profile_create()
    {
        return view('profile_create');
    }

    public function profile_edit(Request $request)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        if (empty($user_profile)) {
            return view('profile_create');
        } else {
            return view('profile_edit', compact('user_profile'));
        }
    }

    public function profile_store(ProfileRequest $request)
    {
        $user_id = Auth::id();
        $image_file = $request->user_image;
        $file_name = uniqid(rand() . '_');
        $extension = $image_file->extension();
        $file_name_store = $file_name . '.' . $extension;
        $resized_image = Image::make($image_file)->resize(300, 300)->encode();
        Storage::put('public/users/' . $file_name_store, $resized_image);

        Profile::create([
            'user_id' => $user_id,
            'image_url' => $file_name_store,
            'user_name' => $request->input('name'),
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building' => $request->input('building')
        ]);
        return redirect()->route('user.mypage');
    }

    public function profile_update(ProfileRequest $request)
    {
        $user_id = Auth::id();
        $image = $request->file('user_image');
        $resized = Image::make($image)->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->store('public/user');

        $image_name = $request->file('user_image')->getClientOriginalName();

        $update_profile = Profile::where('user_id', $user_id)->first();
        $update_profile->update([
            'image_url' => $image_name,
            'user_name' => $request->input('name'),
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building' => $request->input('building')
        ]);
        return redirect()->route('user.mypage');
    }

    public function payment_edit(Request $request, $item_id)
    {
        $user_id = Auth::id();
        $item = Item::where('id', $item_id)->first();
        $payments = Payment::all();
        $user_profile = Profile::where('user_id', $user_id)->first();
        if(empty($user_profile)) {
            return view('profile_create');
        } else {
            return view('payment_edit', compact('item', 'payments'));
        }
    }

    public function payment_update(Request $request, $item_id)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        $user_profile->update([
            'payment_id' => $request->input('payment_id')
        ]);
        return redirect()->route('user.purchase', ['item_id' => $item_id]);
    }

    public function address_edit(Request $request, $item_id)
    {
        $user_id = Auth::id();
        $item = Item::where('id', $item_id)->first();
        $user_profile = Profile::where('user_id', $user_id)->first();
        if(empty($user_profile)) {
            return view('profile_create');
        } else {
            return view('address_edit', compact('item'));
        }
    }

    public function address_update(AddressRequest $request, $item_id)
    {
        $user_id = Auth::id();
        $user_profile = Profile::where('user_id', $user_id)->first();
        $user_profile->update([
            'postcode' => $request->input('postcode'),
            'address' => $request->input('address'),
            'building' => $request->input('building')
        ]);
        return redirect()->route('user.purchase', ['item_id' => $item_id]);
    }
}

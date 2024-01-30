<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (!empty($keyword)) {
            $items = Item::where('name', 'LIKE', "%{$keyword}%")
                ->orWhere('brand_name', 'LIKE', "%{$keyword}%")
                ->orWhere('item_detail', 'LIKE', "%{$keyword}%")
                ->orWhereHas('categories', function ($query) use ($keyword) {
                    $query->where('category', 'LIKE', "%{$keyword}%");
                })
                ->get();
        } else {
            return redirect('/');
        }

        return view('item_search', compact('keyword', 'items'));
    }
}

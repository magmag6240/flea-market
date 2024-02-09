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
            $items = Item::where('name', 'like', '%' . $keyword . '%')
                ->orWhere('brand_name', 'like', '%' . $keyword . '%')
                ->orWhere('price', 'like', '%' . $keyword . '%')
                ->orWhere('item_detail', 'like', '%' . $keyword . '%')
                ->orWhereHas('condition', function ($query) use ($keyword) {
                    $query->where('condition', 'like', '%' . $keyword . '%');
                })
                ->orWhereHas('categories', function ($query) use ($keyword) {
                    $query->where('category', 'like', '%' . $keyword . '%');
                })
                ->get();
        } else {
            return redirect('/');
        }

        return view('item_search', compact('keyword', 'items'));
    }
}

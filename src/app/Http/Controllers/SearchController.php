<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $condition = Condition::all();
        $s = ::all();

        $select_area = $request->input('area');
        $select_genre = $request->input('genre');
        $keyword = $request->input('keyword');

        $query = Shop::query();

        if (!empty($select_area)) {
            $query->where('prefecture_id', 'LIKE', $select_area);
        }

        if (!empty($select_genre)) {
            $query->where('genre_id', 'LIKE', $select_genre);
        }

        if (!empty($keyword)) {
            $query->where('shop_name', 'LIKE', "%{$keyword}%");
        }

        $items = $query->with('prefecture', 'genre', 'evaluations')->get();

        return view('general/shop_list', compact('prefectures', 'genres', 'items', 'select_area', 'select_genre', 'keyword'));
    }
}

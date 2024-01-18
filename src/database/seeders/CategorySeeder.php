<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'category' => 'レディース'],
            ['id' => 2, 'category' => 'メンズ'],
            ['id' => 3, 'category' => 'ベビー・キッズ'],
            ['id' => 4, 'category' => 'インテリア・住まい・小物'],
            ['id' => 5, 'category' => '本・音楽・ゲーム'],
            ['id' => 6, 'category' => 'おもちゃ・ホビー・グッズ'],
            ['id' => 7, 'category' => 'コスメ・香水・美容'],
            ['id' => 8, 'category' => '家電・スマホ・カメラ'],
            ['id' => 9, 'category' => 'スポーツ・レジャー'],
            ['id' => 10, 'category' => 'フラワー・ガーデニング'],
            ['id' => 11, 'category' => 'ハンドメイド'],
            ['id' => 12, 'category' => 'チケット'],
            ['id' => 13, 'category' => '自転車・オートバイ'],
            ['id' => 14, 'category' => 'その他']
        ];
        DB::table('categories')->insert($params);
    }
}

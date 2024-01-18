<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'condition' => '新品'],
            ['id' => 2, 'condition' => '未使用に近い'],
            ['id' => 3, 'condition' => '目立った傷や汚れなし'],
            ['id' => 4, 'condition' => 'やや傷や汚れあり'],
            ['id' => 5, 'condition' => '傷や汚れあり'],
            ['id' => 6, 'condition' => '全体的に状態が悪い']
        ];
        DB::table('conditions')->insert($params);
    }
}

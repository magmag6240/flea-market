<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'category_id' => '1', 'item_id' => '1'],
            ['id' => 2, 'category_id' => '5', 'item_id' => '1'],
            ['id' => 3, 'category_id' => '2', 'item_id' => '2'],
            ['id' => 4, 'category_id' => '4', 'item_id' => '2'],
            ['id' => 5, 'category_id' => '3', 'item_id' => '3'],
            ['id' => 6, 'category_id' => '2', 'item_id' => '4'],
            ['id' => 7, 'category_id' => '9', 'item_id' => '4'],
            ['id' => 8, 'category_id' => '4', 'item_id' => '5'],
            ['id' => 9, 'category_id' => '14', 'item_id' => '6'],
            ['id' => 10, 'category_id' => '4', 'item_id' => '7'],
            ['id' => 11, 'category_id' => '8', 'item_id' => '8'],
            ['id' => 12, 'category_id' => '2', 'item_id' => '9'],
            ['id' => 13, 'category_id' => '6', 'item_id' => '10'],
            ['id' => 14, 'category_id' => '5', 'item_id' => '11'],
            ['id' => 15, 'category_id' => '4', 'item_id' => '12'],
            ['id' => 16, 'category_id' => '2', 'item_id' => '13'],
            ['id' => 17, 'category_id' => '4', 'item_id' => '13'],
            ['id' => 18, 'category_id' => '6', 'item_id' => '14'],
            ['id' => 19, 'category_id' => '3', 'item_id' => '14'],
            ['id' => 20, 'category_id' => '8', 'item_id' => '15'],
            ['id' => 21, 'category_id' => '13', 'item_id' => '15'],
            ['id' => 22, 'category_id' => '8', 'item_id' => '16'],
            ['id' => 23, 'category_id' => '14', 'item_id' => '16'],
            ['id' => 24, 'category_id' => '8', 'item_id' => '17'],
            ['id' => 25, 'category_id' => '8', 'item_id' => '18'],
            ['id' => 26, 'category_id' => '14', 'item_id' => '19'],
            ['id' => 27, 'category_id' => '5', 'item_id' => '19'],
            ['id' => 28, 'category_id' => '14', 'item_id' => '20'],
            ['id' => 29, 'category_id' => '8', 'item_id' => '21'],
            ['id' => 30, 'category_id' => '7', 'item_id' => '21'],
            ['id' => 31, 'category_id' => '8', 'item_id' => '22'],
            ['id' => 32, 'category_id' => '2', 'item_id' => '22'],
            ['id' => 33, 'category_id' => '8', 'item_id' => '23'],
            ['id' => 34, 'category_id' => '4', 'item_id' => '23'],
            ['id' => 35, 'category_id' => '11', 'item_id' => '24'],
            ['id' => 36, 'category_id' => '1', 'item_id' => '24'],
            ['id' => 37, 'category_id' => '6', 'item_id' => '25'],
            ['id' => 38, 'category_id' => '14', 'item_id' => '25'],
        ];
        DB::table('category_item')->insert($params);
    }
}

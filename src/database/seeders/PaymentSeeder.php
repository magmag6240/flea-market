<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'method_name' => 'コンビニ払い'],
            ['id' => 2, 'method_name' => 'クレジットカード払い']
        ];
        DB::table('payments')->insert($params);
    }
}

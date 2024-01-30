<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private const SEEDERS = [
        CategorySeeder::class,
        ConditionSeeder::class,
        PaymentSeeder::class,
        ItemSeeder::class,
        UserSeeder::class
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::SEEDERS as $seeder) {
            $this->call($seeder);
        }
    }
}

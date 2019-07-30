<?php

use App\Models\Sale;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sale::create([
            'title'         => 'Saticisndan1',
            'explanation'   => 'Saticisindan Explanation',
            'price'         => 100.00,
            'is_free'       => false,

            'user_id'       => 1,
            'category_id'   => 1,
        ]);

        Sale::create([
            'title'         => 'Sale2',
            'explanation'   => 'Sale2 Explanation',
            'price'         => 300.00,
            'is_free'       => false,

            'user_id'       => 1,
            'category_id'   => 2,
        ]);
    }
}

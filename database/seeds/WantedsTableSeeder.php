<?php

use App\Models\Wanted;
use Illuminate\Database\Seeder;

class WantedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Wanted::create([
            'title'         => 'Alicisindan1',
            'explanation'   => 'Alicisindan Explanation',
            'price'         => 100.00,
            'is_free'       => false,

            'user_id'       => 1,
            'category_id'   => 1,
        ]);

        Wanted::create([
            'title'         => 'Wanted2',
            'explanation'   => 'Wanted2 Explanation',
            'price'         => 300.00,
            'is_free'       => false,

            'user_id'       => 1,
            'category_id'   => 2,
        ]);
    }
}

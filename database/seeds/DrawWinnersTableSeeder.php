<?php

use App\Models\DrawUserWinner;
use Illuminate\Database\Seeder;

class DrawWinnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DrawUserWinner::create([
            'user_id'       => 1,
            'draw_id'       => 1,
        ]);
    }
}

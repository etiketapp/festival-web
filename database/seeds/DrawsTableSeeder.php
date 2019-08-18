<?php

use App\Models\Draw;

use Illuminate\Database\Seeder;

class DrawsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Draw::create([
            'title'         => 'Draw 1',
            'sub_title'     => 'Draw Sub Title',
            'content'       => 'Draw Content',
            'last_date'     => \Carbon\Carbon::now()
        ]);
    }
}

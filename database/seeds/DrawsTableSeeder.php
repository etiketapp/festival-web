<?php

use App\Models\Draw;

use App\Models\DrawUser;
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
            'title'         => 'Araba Çekilişi',
            'sub_title'     => 'Araba Çekilişi',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'last_date'     => \Carbon\Carbon::now()
        ]);

        DrawUser::create([
           'draw_id'        => 1,
           'user_id'        => 1,
        ]);

        DrawUser::create([
            'draw_id'        => 1,
            'user_id'        => 2,
        ]);

        DrawUser::create([
            'draw_id'        => 1,
            'user_id'        => 3,
        ]);

        DrawUser::create([
            'draw_id'        => 1,
            'user_id'        => 4,
        ]);

        DrawUser::create([
            'draw_id'        => 1,
            'user_id'        => 5,
        ]);
    }
}

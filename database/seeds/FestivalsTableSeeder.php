<?php

use App\Models\Festival;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class FestivalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Festival::create([
            'title'         => 'Festival title',
            'sub_title'     => 'Festival sub-title',
            'content'       => 'Festival Content',
            'place'         => 'Festival place',
            'price'         => 500.00,
            'about'         => 'Festival about',
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        Festival::create([
            'title'         => 'Festival2 title',
            'sub_title'     => 'Festival2 sub-title',
            'content'       => 'Festival2 Content',
            'place'         => 'Festival2 place',
            'price'         => 300.00,
            'about'         => 'Festival2 about',
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        Festival::create([
            'title'         => 'Festival4 title',
            'sub_title'     => 'Festival4 sub-title',
            'content'       => 'Festival4 Content',
            'place'         => 'Festival4 place',
            'about'         => 'Festival4 about',
            'price'         => 800.00,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));


    }
}

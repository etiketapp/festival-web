<?php

use App\Models\Address;
use App\Models\Festival;
use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;
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
            'category_id'   => 3,
            'date'          => Carbon::now(),
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
            'category_id'   => 2,
            'date'          => Carbon::now(),
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        $d4 = Festival::query()->find(2);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Adana',
        ]);

        $adress->addressable()->associate($d4);
        $adress->save();

        Festival::create([
            'title'         => 'Festival4 title',
            'sub_title'     => 'Festival4 sub-title',
            'content'       => 'Festival4 Content',
            'place'         => 'Festival4 place',
            'about'         => 'Festival4 about',
            'price'         => 800.00,
            'category_id'   => 1,
            'date'          => Carbon::now(),
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        $d5 = Festival::query()->find(1);
        $adress = new Address([
            'city_id'   => 1,
            'county_id' => 1,
            'address'   => 'Adana',
        ]);
        $adress->addressable()->associate($d5);
        $adress->save();

    }
}

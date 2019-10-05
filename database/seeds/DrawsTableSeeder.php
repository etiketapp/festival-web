<?php

use App\Models\Draw;

use App\Models\DrawGallery;
use App\Models\DrawUser;
use App\Models\Image;
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
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
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

        DrawGallery::create([
            'draw_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 1,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_1.jpg')),
            ])
        );
    }
}

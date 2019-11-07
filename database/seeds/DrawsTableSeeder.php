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
            'title'         => '1',
            'sub_title'     => '1',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '2',
            'sub_title'     => '2',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '3',
            'sub_title'     => '3',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '4',
            'sub_title'     => '4',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '4',
            'sub_title'     => '4',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '5',
            'sub_title'     => '5',
            'content'       => 'Renault Clio Otomobil Kazanma Şansı Yakalayabilirsiniz!',
            'draw_time'     => \Carbon\Carbon::now()->addHour(1),
            'last_date'     => \Carbon\Carbon::now()
        ]);

        Draw::create([
            'title'         => '6',
            'sub_title'     => '6',
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

        DrawGallery::create([
            'draw_id' => 2,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_3.jpg')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 3,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/festivals/image_2.jpg')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 4,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/festival.png')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 5,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/other.png')),
            ])
        );

        DrawGallery::create([
            'draw_id' => 6,
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/muzik.png')),
            ])
        );

    }
}

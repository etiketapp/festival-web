<?php

use App\Models\Category;
use App\Models\Image;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title'         => 'Festival',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/festival.png')),
            ])
        );

        Category::create([
            'title'         => 'Müzik',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/muzik.png')),
            ])
        );

        Category::create([
            'title'         => 'Spor',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/spor.png')),
            ])
        );

        Category::create([
            'title'         => 'Teknoloji',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/teknoloji.png')),
            ])
        );

        Category::create([
            'title'         => 'Yemek',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/yemek.png')),
            ])
        );

        Category::create([
            'title'         => 'Diğer',
        ])->image()->save(new Image([
                'image' => Intervention::make(database_path('seeds/images/categories/other.png')),
            ])
        );
    }
}

<?php

use App\Models\Category;
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
        ]);

        Category::create([
            'title'         => 'Müzik',
        ]);

        Category::create([
            'title'         => 'Spor',
        ]);

        Category::create([
            'title'         => 'Teknoloji',
        ]);

        Category::create([
            'title'         => 'Yemek',
        ]);

        Category::create([
            'title'         => 'Diğer',
        ]);
    }
}

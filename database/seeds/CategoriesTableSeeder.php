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
            'title'         => 'Kategori 1',
        ]);

        Category::create([
            'title'         => 'Kategori 2',
        ]);

        Category::create([
            'title'         => 'Kategori 3',
        ]);

        Category::create([
            'title'         => 'Kategori 4',
        ]);

        Category::create([
            'title'         => 'Kategori 5',
        ]);
    }
}

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
            'title'         => 'Kategori1',
            'description'   => 'Kategori1 Description',
        ]);

        Category::create([
            'title'         => 'Kategori2',
            'description'   => 'Kategori2 Description',
        ]);
    }
}

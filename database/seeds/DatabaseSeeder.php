<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(ContractsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(FestivalsTableSeeder::class);
        $this->call(DrawsTableSeeder::class);
        $this->call(DrawWinnersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(LikesTableSeeder::class);
        $this->call(CommentsTableSeeder::class);
    }
}

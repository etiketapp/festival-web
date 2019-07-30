<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'Admin',
            'last_name'  => 'Admin',
            'email'      => 'admin@admin.com',
            'password'   => 'password',
        ]);
    }
}

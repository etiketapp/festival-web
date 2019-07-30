<?php

use App\Models\Contract;
use Illuminate\Database\Seeder;

class ContractsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contract::create([
            'title'     => 'Sözleşme 1',
            'content'   => 'Sözleşme 1 İçerik',
        ]);

        Contract::create([
            'title'     => 'Sözleşme 2',
            'content'   => 'Sözleşme 2 İçerik',
        ]);


    }
}

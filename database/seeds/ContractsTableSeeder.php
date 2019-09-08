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
            'title'     => 'Kullanım Koşulları Sözleşmesi',
            'content'   => 'Kullanım Koşulları İçerik',
        ]);

        Contract::create([
            'title'     => 'Gizlilik Sözleşmesi',
            'content'   => 'Gizlilik Sözleşmesi İçerik',
        ]);

    }
}

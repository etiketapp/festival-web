<?php

use App\Models\Contract;
use App\Models\Conversation;
use Illuminate\Database\Seeder;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Conversation::create([
            'user_one'      => 1,
            'user_two'      => 2,
        ]);
    }
}

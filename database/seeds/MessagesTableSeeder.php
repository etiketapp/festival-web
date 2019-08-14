<?php

use App\Models\Contract;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::create([
            'message'           => 'Test Message',

            'user_id'           => 1,
            'conversation_id'   => 1,
        ]);
    }
}

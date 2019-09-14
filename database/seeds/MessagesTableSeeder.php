<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Models\Image;
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
        Conversation::create([
            'user_id'       => 1,
            'user_two'      => 2,
        ]);

        Message::create([
            'message'           => 'Message1',
            'user_id'           => 1,
            'receiver_id'       => 2,
            'conversation_id'   => 1,
        ]);
    }
}

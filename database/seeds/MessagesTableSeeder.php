<?php

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use App\Models\Image;
use Carbon\Carbon;
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
            'user_one_id'          => 1,
            'user_two_id'          => 2,
        ]);

        Message::create([
            'message'           => 'Message1',
            'user_one_id'       => 1,
            'date'              => Carbon::now()->format('Y-m-d H:i:s'),
            'is_readed'         => 1,
            'user_two_id'       => 2,
            'conversation_id'   => 1,
        ]);
    }
}

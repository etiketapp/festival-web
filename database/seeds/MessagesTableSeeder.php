<?php

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
            'title'         => 'Message Title Seeder',
            'message'       => 'Message Content Seeder',

            'sender_id'     => 2,
            'receiver_id'   => 1,
        ]);
    }
}

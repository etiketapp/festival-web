<?php

use App\Models\Conversation;
use App\Models\Like;
use App\Models\Message;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create([
            'is_liked'       => true,
            'user_id'           => 1,
            'festival_id'       => 1,
        ]);
    }
}

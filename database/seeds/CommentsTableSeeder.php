<?php

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
            'comment'       => 'Comment',
            'user_id'       => 1,
            'festival_id'   => 1,
        ]);
    }
}

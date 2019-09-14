<?php

use App\Models\AdminNotification;
use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class AdminNotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminNotification::create([
            'title'         => 'Notification1',
            'text'          => 'Notification Text',
        ]);
    }
}

<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'id'    => Setting::LAST_VERSION_ANDROID,
            'value' => '1.0.0',
        ]);

        Setting::create([
            'id'    => Setting::UPDATE_VERSION_ANDROID,
            'value' => '0.5.0',
        ]);

        Setting::create([
            'id'    => Setting::LAST_VERSION_IOS,
            'value' => '1.0.0',
        ]);

        Setting::create([
            'id'    => Setting::UPDATE_VERSION_IOS,
            'value' => '0.5.0',
        ]);
    }
}

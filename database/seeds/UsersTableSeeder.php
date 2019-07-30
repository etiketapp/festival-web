<?php

use App\Models\User;
use App\Models\Image;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name'  => 'User1',
            'email'      => 'user1@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User2',
            'email'      => 'user2@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User3',
            'email'      => 'user3@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User4',
            'email'      => 'user4@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_FEMALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User5',
            'email'      => 'user5@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User6',
            'email'      => 'user6@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));

        User::create([
            'full_name'  => 'User7',
            'email'      => 'user7@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_FEMALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/logo.png')),
        ]));


    }
}

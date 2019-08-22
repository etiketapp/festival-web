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
            'full_name'  => 'Basak Insel',
            'email'      => 'user1@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/female_1.jpg')),
        ]));

        User::create([
            'full_name'  => 'Yusuf Ozturk',
            'email'      => 'user2@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/female_2.jpg')),
        ]));

        User::create([
            'full_name'  => 'Ayse Cengiz',
            'email'      => 'user3@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/female_3.jpg')),
        ]));

        User::create([
            'full_name'  => 'Ali Koç',
            'email'      => 'user4@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_FEMALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/male_1.jpg')),
        ]));

        User::create([
            'full_name'  => 'Azmi Yilmaz',
            'email'      => 'user5@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/male_2.jpg')),
        ]));

        User::create([
            'full_name'  => 'Ayse Tugba Sengel',
            'email'      => 'user6@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_MALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/female_1.jpg')),
        ]));

        User::create([
            'full_name'  => 'Jesse Pinkman',
            'email'      => 'user7@user.com',
            'password'   => 'password',
            'gender'     => User::GENDER_FEMALE,
        ])->image()->save(new Image([
            'image'     => Intervention::make(database_path('seeds/images/users/users/male_1.jpg')),
        ]));


    }
}

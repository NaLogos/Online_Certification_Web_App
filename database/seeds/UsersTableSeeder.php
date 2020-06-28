<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$wNIDxA5tfzPm6XEsjrt0IOS9dbUrhjZSigPvzruq2Rz0BEqudStyK',
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Expert',
                'email'          => 'expert@expert.com',
                'password'       => '$2y$10$wNIDxA5tfzPm6XEsjrt0IOS9dbUrhjZSigPvzruq2Rz0BEqudStyK',
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Candidat',
                'email'          => 'candidat@candidat.com',
                'password'       => '$2y$10$wNIDxA5tfzPm6XEsjrt0IOS9dbUrhjZSigPvzruq2Rz0BEqudStyK',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}

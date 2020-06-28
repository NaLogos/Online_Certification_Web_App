<?php

use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'active_at' => '2020-06-01 09:00:00',
            ],
            [
                'id'    => 2,
                'active_at' => '2020-06-02 09:00:00',
            ],
            [
                'id'    => 3,
                'active_at' => '2020-06-03 09:00:00',
            ],
        ];

        Role::insert($roles);
    }
}

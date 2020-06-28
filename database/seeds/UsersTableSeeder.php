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
                'password'       => '$2y$10$B6/VltdjxjpLtMmJ4t61PefD8EGkP7a5KIXl7CNxmXjeXpepCG1QG',
                'remember_token' => null,
                'suite'          => '',
            ],
        ];

        User::insert($users);
    }
}

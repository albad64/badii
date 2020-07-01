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
                'password'       => '$2y$10$I1WXtHd5B7MTu2vuMRxaBeFKrM83yDKAbM.u92UYWTSeTLVxvYaui',
                'remember_token' => null,
                'suite'          => '',
            ],
        ];

        User::insert($users);
    }
}

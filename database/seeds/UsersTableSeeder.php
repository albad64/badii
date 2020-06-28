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
                'password'       => '$2y$10$RyaFx2gPXxQAVhX6LxfLqeSullw104SHjoQ8iYBLmkJPj5jYdgtbe',
                'remember_token' => null,
                'suite'          => '',
            ],
        ];

        User::insert($users);
    }
}

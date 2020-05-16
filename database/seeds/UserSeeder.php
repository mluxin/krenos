<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Marina',
                'email' => 'marina@gmail.com',
                'role' => User::ADMIN,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Baptiste',
                'email' => 'baptiste@gmail.com',
                'role' => User::ADMIN,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Alice',
                'email' => 'alice@gmail.com',
                'role' => User::TEACHER,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Juliette',
                'email' => 'juliette@gmail.com',
                'role' => User::TEACHER,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Martin',
                'email' => 'martin@gmail.com',
                'role' => User::EMPLOYEE,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Alan',
                'email' => 'alan@gmail.com',
                'role' => User::EMPLOYEE,
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Julie',
                'email' => 'julie@gmail.com',
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Isabelle',
                'email' => 'isabelle@gmail.com',
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Victor',
                'email' => 'victor@gmail.com',
                'password' => Hash::make('123'),
            ],

            [
                'name' => 'Marc',
                'email' => 'marc@gmail.com',
                'password' => Hash::make('123'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}

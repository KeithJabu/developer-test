<?php

use app\User;
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
        $users = [
            [
                'name'       => 'Shannon',
                'surname'    => 'James',
                'email'      => str_random(10).'@gmail.com',
                'position'   => 'Secretary'
            ],
            [
                'name'     => 'Peter',
                'surname'  => 'Micheal',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Admin'
            ],
            [
                'name'     => 'Keith',
                'surname'  => 'Msimango',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Tech'
            ],
            [
                'name'     => 'Patrick',
                'surname'  => 'Molefe',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Consultant'
            ]
        ];

        foreach($users as $user){
            User::create($user);
        }

    }
}

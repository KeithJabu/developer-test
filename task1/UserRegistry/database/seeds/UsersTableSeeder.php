<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name'     => 'Shannon',
                'surname'  => 'James',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Secretary',
            ],
            [
                'name'     => 'Peter',
                'surname'  => 'Micheal',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Admin',
            ],
            [
                'name'     => 'Keith',
                'surname'  => 'Msimango',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Tech',
            ],
            [
                'name'     => 'Patrick',
                'surname'  => 'Molefe',
                'email'    => str_random(10).'@gmail.com',
                'position' => 'Consultant',
            ]
        );
    }
}

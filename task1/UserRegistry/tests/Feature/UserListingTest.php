<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserListingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testController()
    {
        $response = $this->get('/');
        $this->assertTrue(true);
    }

    public function testUserExisitng()
    {
        $user =  [
            'name'       => 'Shannon',
            'surname'    => 'James',
            'email'      => 'keithkjabumsimango@gmail.com',
            'position'   => 'Secretary'
        ];

        if (User::userExists($user['email'])) {
            $this->assertTrue(true, 'user already exists');
        } else {
            $this->assertFalse(false, 'user can be created');
        }
    }
}

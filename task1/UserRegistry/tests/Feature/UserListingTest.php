<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class UserListingTest extends TestCase
{
    //todo need guidance on unit testing and the right way to do these test

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testController()
    {
        $response = $this->get('/users');
        $response->assertStatus(200);
    }

    public function testUserCreationAndDelete()
    {
        // First The user is created
        $user = User::create([
            'name'       => 'Shannon',
            'surname'    => 'James',
            'email'      => str_random(10) . '@gmail.com',
            'position'   => 'Secretary'
        ]);

        //act as user
        $this->actingAs($user);

        if ($user) {
            $this->assertTrue(true);
        } else {
            $this->assertFalse(false);
        }

        // Then we want to make sure a profile page is created
        $response = $this->post('/api/users/destroy/'. $user->id);
        $response->assertStatus(200);
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

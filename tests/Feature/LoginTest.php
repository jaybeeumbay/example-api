<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    // use RefreshDatabase;

    /**
     * Test for successfull login
     *
     * @return void
     */
    public function testLogin()
    {
        $this->createUser();

        $data = [
            'email' => 'backend@multisyscorp.com',
            'password' => 'test123',
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(201);
    }

    /**
     * Test for invalid login
     *
     * @return void
     */
    public function testInvalidLogin()
    {
        $this->createUser();

        $data = [
            'email' => 'backend123123@multisyscorp.com',
            'password' => 'test121231233',
        ];

        $response = $this->post('/api/login', $data);

        $response->assertStatus(401)
            ->assertJson(['message' => 'Invalid credentials']);
    }

    // Default User Details
    public function createUser()
    {
        $data = [
            'name' => 'Guest',
            'email' => 'backend@multisyscorp.com',
            'password' => 'test123',
        ];

        $response = $this->post('/api/register', $data);
    }


}

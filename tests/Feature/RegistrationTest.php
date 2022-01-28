<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test registration.
     *
     * @return void
     */
    public function testRegistration()
    {
        $data = [
            'name' => 'Guest',
            'email' => 'backend@multisyscorp.com',
            'password' => 'test123',
        ];

        $response = $this->post('/api/register', $data);

        $response->assertStatus(201)
            ->assertJson(['message' => 'User successfully registered']);
    }
}

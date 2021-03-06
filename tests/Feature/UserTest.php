<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'senha123'
        ]);

        $this->actingAs($user);

        $response = $this->get('/users');

        $response->assertStatus(200);
    }

    public function test_create_user()
    {
        $response = $this->post('/login/create', [
            'name' => 'Admin',
            'email' => 'admin@master.com',
            'password' => '12345678',
            'is_admin' => 1,
        ]);

        $response->assertStatus(200);
    }

    // public function test_create_user()
    // {
    //     $response = $this->post('/login', [
    //         'name' => 'Admin',
    //         'email' => 'admin@master.com',
    //         'password' => '12345678',
    //         'is_admin' => 1,
    //     ]);

    //     $response->assertStatus(302);
    // }
}

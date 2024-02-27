<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_user()
    {
        $userData = [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ];

        $response = $this->postJson('api/register', $userData);
        $response->assertStatus(200)
                ->assertJsonStructure(['data', 'acces_token', 'token_type']);
    }

    public function test_login_user()
    {
        $user = User::factory()->create();

        $loginData = [
            'email' => $user->email,
            'password' => 'password', 
        ];

        $response = $this->postJson('api/login', $loginData);
        $response->assertStatus(200)
                ->assertJsonStructure(['message', 'acces_token', 'token_type']);
    }

    public function test_logout_user()
    {
        $user = User::factory()->create();
        $token = $user->createToken('auth_token')->plainTextToken;

        $this->actingAs($user)->assertAuthenticated();

        $response = $this->actingAs($user)->withToken($token)->getJson('api/logout');
        $response->assertStatus(200)
                ->assertJson(['message' => 'Sesión cerrada correctamente']);
    }




}

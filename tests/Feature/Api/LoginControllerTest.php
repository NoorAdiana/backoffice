<?php

namespace Tests\Feature\Api;

use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /** @test */
    function it_can_authenticate_user()
    {
        $response = $this->postJson('/api/login', ['email' => $this->user->email, 'password' => 'secret']);
        $response->assertStatus(200);
        $response->assertJsonStructure(['token', 'expires_in']);
        $response->assertJson(['token_type' => 'bearer']);
    }

    /** @test */
    function it_can_logout()
    {
        $token = $this->postJson('/api/login', ['email' => $this->user->email, 'password' => 'secret'])
            ->json()['token'];
            
        $this->postJson("/api/logout?token=$token")->assertStatus(200);
    }

}

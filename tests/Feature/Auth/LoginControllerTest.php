<?php

namespace Tests\Feature\Auth;

use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /** @test */
    public function it_can_show_login_page()
    {
        $response = $this->get('login');
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');

        $this->assertGuest();
    }
    
    /** @test */
    public function user_can_login()
    {
        $response = $this->post('login', ['email' => $this->user->email, 'password' => 'secret']);
        $response->assertStatus(302);
        $response->assertRedirect('home');

        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($this->user);
    }

    /** @test */
    public function user_can_logout()
    {
        $this->actingAs($this->user);

        $response = $this->post('logout');
        $response->assertStatus(302);
        $response->assertRedirect('/');

        $this->assertGuest();
    }

    /** @test */
    public function it_can_redirect_user()
    {
        $response = $this->get('home');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}

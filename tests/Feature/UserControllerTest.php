<?php

namespace Tests\Feature;

use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /** @test */
    public function it_can_show_list_user()
    {
        $response = $this->actingAs($this->user)->get('users');
        $response->assertStatus(200);
        $response->assertViewIs('users.index');
    }

    /** @test */
    public function it_cannot_show_list_user()
    {
        $response = $this->get('users');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}

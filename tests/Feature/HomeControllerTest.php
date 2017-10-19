<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeControllerTest extends TestCase
{
    /** @test */
    public function it_can_show_dashboard()
    {
        $response = $this->actingAs($this->user)->get('home');
        $response->assertStatus(200);
        $response->assertViewIs('home');
    }

    /** @test */
    public function it_cannot_show_dashboard()
    {
        $response = $this->get('home');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }
}

<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class UsersControllerTest extends TestCase
{
    /** @test */
    public function it_can_show_list_user()
    {
        $users = factory(User::class)->create();

        $response = $this->actingAs($this->user)->get('users');
        $response->assertStatus(200);
        $response->assertViewIs('users.index');
        $response->assertViewHas('users');
    }

    /** @test */
    public function it_cannot_show_list_user()
    {
        $response = $this->get('users');
        $response->assertStatus(302);
        $response->assertRedirect('login');
    }

    /** @test */
    public function it_can_show_create_user_form()
    {
        $response = $this->actingAs($this->user)->get('users/create');
        $response->assertStatus(200);
        $response->assertViewIs('users.create');
    }

    /** @test */
    public function it_can_store_user()
    {
        $response = $this->actingAs($this->user)->post('users', [
            'name' => 'Nuradiyana',
            'email' => 'nur@adiyana.com',
            'password' => 'secret',
            'password_confirmation' => 'secret'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/users');
        $response->assertSessionHas('status');

        $user = User::where('email', 'nur@adiyana.com')->first();
        $this->assertEquals($user->name, 'Nuradiyana');
        $this->assertEquals($user->email, 'nur@adiyana.com');
        $this->assertTrue(Hash::check('secret', $user->password));
    }

    /** @test */
    public function it_can_delete_user()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($this->user)->delete("/users/{$user->id}");

        $response->assertStatus(302);
        $response->assertSessionHas('status');

        $this->assertNull(User::find($user->id));
    }
}

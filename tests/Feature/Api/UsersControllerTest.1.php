<?php

namespace Tests\Feature\Api;

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
    }

    /** @test */
    public function it_cannot_show_list_user()
    {
        $response = $this->get('users');
        $response->assertStatus(401);
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

        $response->assertStatus(200);

        $user = User::where('email', 'nur@adiyana.com')->first();
        $this->assertEquals($user->name, 'Nuradiyana');
        $this->assertEquals($user->email, 'nur@adiyana.com');
        $this->assertTrue(Hash::check('secret', $user->password));
    }

    /** @test */
    public function it_can_update_user()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($this->user)->post("/users/{$user->id}", [
            'id' => $user->id,
            'name' => 'Nuradiyana',
            'email' => 'nur@adiyana.com',
            'password' => 'secretq',
            'password_confirmation' => 'secretq'
        ]);
        
        $newUser = User::find($user->id);
        $this->assertNotEquals($user->name, $newUser->name);
        $this->assertNotEquals($user->email, $newUser->email);
        $this->assertFalse(Hash::check('secretq', $user->password));
    }
    
    /** @test */
    public function it_can_delete_user()
    {
        $user = factory(User::class)->create();

        $this->actingAs($this->user)->delete("/users/{$user->id}");

        $this->assertNull(User::find($user->id));
    }
}

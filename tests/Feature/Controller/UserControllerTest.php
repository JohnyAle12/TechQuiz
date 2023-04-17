<?php

namespace Tests\Feature\Controller;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUsersList()
    {
        $count = 5;
        User::factory()->count($count)->create();
        $response = $this->getJson('/api/user');

        $response->assertStatus(200)->assertJsonCount($count, 'users');
        $this->assertEquals($response['users'], User::all()->toArray());
    }

    public function testSaveUser()
    {
        $data = [
            'category_id' => Category::factory()->create()->id,
            'name' => 'Johny Alejandro',
            'lastname' => 'Prieto',
            'identification' => 123,
            'email' => 'john@mail.com',
            'country' => 'Colombia',
            'address' => 'Calle 123',
            'mobile' => '3126678008',
        ];

        $response = $this->postJson('/api/user', $data);

        $response->assertStatus(201)
            ->assertJsonCount(2);
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', $data);
    }

    public function testUpdateUser()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $data = [
            'name' => 'Johny Alejandro',
            'lastname' => 'Prieto',
        ];

        $response = $this->patchJson("/api/user/{$user->id}", $data);
        $response->assertStatus(200)
            ->assertJsonCount(2);
        $this->assertEquals($data['name'], User::first()->name);        
    }

    public function testDeleteUser()
    {
        $user = User::factory()->create();
        
        $response = $this->deleteJson("/api/user/{$user->id}");

        $response->assertStatus(200)
            ->assertJsonCount(1);
        $this->assertSoftDeleted($user);
    }

}

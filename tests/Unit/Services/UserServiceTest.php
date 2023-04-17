<?php

namespace Tests\Unit\Services;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Models\Category;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    use RefreshDatabase;

    private UserService $userService;

    public function testSaveUser()
    {
        $data = new UserRequest([
            'category_id' => Category::factory()->create()->id,
            'name' => 'John',
            'lastname' => 'Doe',
            'identification' => 123,
            'email' => 'john@mail.com',
            'country' => 'Colombia',
            'address' => 'Calle 123',
            'mobile' => '3126678008',
        ]);

        $result = $this->userService->saveUser($data);

        $this->assertEquals($result->name, $data->all()['name']);
        $this->assertInstanceOf(User::class, $result);
        $this->assertDatabaseHas('users', $data->all());
    }

    public function testGetUsers()
    {
        $count = 5;
        User::factory()->count($count)->create();

        $result = $this->userService->getUsers();

        $this->assertIsArray($result);
        $this->assertDatabaseCount('users', $count);

    }

    public function testUpdateUser()
    {
        $data = new UpdateUserRequest([
            'name' => 'John',
            'lastname' => 'Doe',
        ]);

        $user = User::factory()->create();

        $result = $this->userService->updateUser($data, $user);

        $this->assertEquals($result->name, $data->all()['name']);
        $this->assertInstanceOf(User::class, $result);
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->userService = new UserService;
    }
}

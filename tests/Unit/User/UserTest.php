<?php

namespace Tests\Unit\User;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class UserTest extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $user = User::factory()->create();
        
        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);
    }

    public function testGetCollection(): void
    {
        $response = $this->get("/users");
        
        $response->assertStatus(200);
        $this->assertNotEmpty($response->getData());
    }

    public function testGet(): void
    {
        $response = $this->get("/users/2");
        $response->assertStatus(200);
    }

    public function testGetNotFound(): void
    {
        $response = $this->get("/users/124");
        $response->assertStatus(404);
    }

    public function testCreateUpdateDelete(): void
    {
        // Create
        $response = $this->post("/users", [
            'email'         => 'email123@gmail.com',
            'first_name'    => 'Test first name',
            'last_name'     => 'Test last name',
            'avatar'        => 'Avatar.jpg',
        ]);

        $this->assertEquals(JsonResponse::HTTP_CREATED, $response['status']);

        // Check is created
        $createdId = $response['user']['id'];
        $response = $this->get("/users/".$createdId);
        $response->assertStatus(200);
        $this->assertEquals('email123@gmail.com', $response['user']['email']);

        // Update
        $response = $this->put("/users/".$createdId, [
            'email'         => 'updatedEmail123@gmail.com',
            'first_name'    => 'Updated Test first name',
            'last_name'     => 'Updated Test last name',
            'avatar'        => 'UpdatedAvatar.jpg',
        ]);

        $this->assertEquals(JsonResponse::HTTP_OK, $response['status']);

        // Check is updated
        $response = $this->get("/users/".$createdId);
        $response->assertStatus(200);
        $this->assertEquals('updatedEmail123@gmail.com', $response['user']['email']);

        // Delete
        $response = $this->delete("/users/".$createdId);
        $response->assertSuccessful();

        // Check is deleted
        $response = $this->get("/users/".$createdId);
        $response->assertStatus(404);
    }

    public function testUpdateNotFound(): void
    {
        $response = $this->put("/users/124", [
            'email'         => 'email123@gmail.com',
            'first_name'    => 'Test first name',
            'last_name'     => 'Test last name',
            'avatar'        => 'Avatar.jpg',
        ]);

        $response->assertStatus(404);
    }

}

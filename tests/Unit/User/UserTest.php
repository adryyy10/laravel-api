<?php

namespace Tests\Unit\User;

use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class UserTest extends TestCase
{

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
    }

}

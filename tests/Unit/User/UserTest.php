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

}

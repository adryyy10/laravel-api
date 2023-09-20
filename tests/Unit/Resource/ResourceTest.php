<?php

namespace Tests\Unit\Resource;

use App\Models\User;
use Tests\TestCase;

class ResourceTest extends TestCase
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

    public function testGet(): void
    {
        $response = $this->get("/unknown/2");
        $response->assertStatus(200);
    }

    public function testGetNotFound(): void
    {
        $response = $this->get("/unkown/24");
        $response->assertStatus(404);
    }

    public function testGetCollection(): void
    {
        $response = $this->get("/unknown");
        $response->assertStatus(200);
    }

}

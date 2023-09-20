<?php

namespace Tests\Unit\Resource;

use Tests\TestCase;

class ResourceTest extends TestCase
{

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

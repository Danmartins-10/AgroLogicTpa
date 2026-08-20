<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiRoutesTest extends TestCase
{
    public function test_api_root_is_available(): void
    {
        $response = $this->getJson('/api/bois');

        $response->assertStatus(200);
    }
}

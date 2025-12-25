<?php

namespace XBot\OneUI\Tests\Feature;

use XBot\OneUI\Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_returns_successful_response(): void
    {
        $response = $this->get('/');
        
        $response->assertStatus(200);
    }
}

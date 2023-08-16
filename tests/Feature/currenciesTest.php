<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class currenciesTest extends TestCase
{
    public function test_example(): void
    {
        $response = $this->call('get', '/?source=USD&target=JPY&amount=$1,525');

        $response->assertStatus(200);

        $response->assertSee('success');
    }
}

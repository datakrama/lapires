<?php

namespace Datakrama\Lapires\Test;

use Datakrama\Lapires\Traits\ApiResponser;
use Illuminate\Routing\Router;

class ErrorHandlingTest extends TestCase
{
    use ApiResponser;

    /** @test */
    public function httpNotFound()
    {
        $response = $this->getJson('/hellow');
        $response
            ->assertStatus(404)
            ->assertJson([
                'success' => false,
            ]);
    }

    /** @test */
    public function httpMethodNotFound()
    {
        $response = $this->postJson('/hello');
        $response
            ->assertStatus(405)
            ->assertJson([
                'success' => false,
            ]);
    }
}

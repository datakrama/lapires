<?php

namespace Datakrama\Lapires\Test;

class ResponseTest extends TestCase
{
    /** @test */
    public function successResponseTest()
    {
        $response = $this->getJson('/success');
        $response
            ->assertOk()
            ->assertJson([
                'success' => true,
            ]);
    }

    /** @test */
    public function errorResponseTest()
    {
        $response = $this->getJson('/error');
        $response
            ->assertUnauthorized()
            ->assertJson([
                'success' => false,
            ]);
    }
}

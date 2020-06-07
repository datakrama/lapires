<?php

namespace Datakrama\Lapires\Test;

use Datakrama\Lapires\Controllers\ApiController;

class DataResponseTest extends TestCase
{
    /**
     * Instantiate the controller
     *
     * @return void
     */
    public function controller()
    {
        return new ApiController;
    }

    /** @test */
    public function dataCreatedResponseTest()
    {
        $request = $this->postJson('/dataCreated', [
            'foo'     =>     'bar'
        ]);
        $controller = $this->controller();
        $response = $controller->dataCreated($request);
        $this->assertEquals(201, $response->getStatusCode());
    }

    /** @test */
    public function dataUpdatedResponseTest()
    {
        $request = $this->putJson('/dataUpdated', [
            'foo'     =>     'bar'
        ]);
        $controller = $this->controller();
        $response = $controller->dataUpdated($request);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /** @test */
    public function dataDeletedResponseTest()
    {
        $request = $this->deleteJson('/dataDeleted');
        $controller = $this->controller();
        $response = $controller->dataDeleted($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}

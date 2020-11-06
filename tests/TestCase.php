<?php

namespace Datakrama\Lapires\Test;

use Datakrama\Lapires\LapiresServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use Datakrama\Lapires\Traits\ApiResponser;

class TestCase extends Orchestra
{
    use ApiResponser;

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Define package providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getPackageProviders($app)
    {
        return [
            LapiresServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['router']->get('hello', ['uses' => function () {
            return 'Hello world!';
        }]);

        $app['router']->get('success', ['uses' => function () {
            return $this->successResponse(null, ['This is success response example.']);
        }]);

        $app['router']->get('error', ['uses' => function () {
            return $this->errorResponse(401, ['This is error response example.']);
        }]);
    }

    /**
     * Get application timezone.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return string|null
     */
    protected function getApplicationTimezone($app)
    {
        return 'Asia/Jakarta';
    }
}

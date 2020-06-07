<?php

namespace Datakrama\Lapires\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Datakrama\Lapires\Traits\ApiResponser;

class Handler extends ExceptionHandler
{
    use ApiResponser;

    /**
     * Convert the given exception to an array.
     *
     * @param  \Exception  $e
     * @return array
     */
    protected function convertExceptionToArray(Exception $e)
    {
        return config('app.debug') ? $this->errorResponse($e->getStatusCode(), $e->getMessage(), [
            'exception' => get_class($e),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => collect($e->getTrace())->map(function ($trace) {
                return Arr::except($trace, ['args']);
            })->all()
        ]) : ($this->isHttpException($e) ? $this->errorResponse($e->getStatusCode(), $e->getMessage()) : $this->errorResponse(500, 'Server Error'));
    }
}

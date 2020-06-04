<?php

namespace Datakrama\Lapires\Traits;

trait ApiResponser {

    /**
     * Returning success response
     *
     * @param array $data
     * @param string $message
     * @param integer $code
     * @return void
     */
    protected function successResponse($data = null, $message = null, $code = 200)
	{
		return response()->json([
			'success' => true, 
			'message' => $message, 
			'data' => $data
		], $code);
	}

    /**
     * Returning error response
     *
     * @param integer $code
     * @param string $message
     * @return void
     */
	protected function errorResponse($code, $message = null)
	{
		return response()->json([
			'success' => false,
			'message' => $message,
			'data' => null
		], $code);
	}

}
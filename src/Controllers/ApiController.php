<?php

namespace Datakrama\Lapires\Controllers;

use App\Http\Controllers\Controller;
use Datakrama\Lapires\Traits\ApiResponser;

class ApiController extends Controller
{
    use ApiResponser;

    /**
     * Returning successfully created data response
     *
     * @param array $data
     * @return void
     */
    public function dataCreated($data)
    {
        return $this->successResponse($data, __('Data successfully created.'), 201);
    }

    /**
     * Returning successfully updated data response
     *
     * @param array $data
     * @return void
     */
    public function dataUpdated($data)
    {
        return $this->successResponse($data, __('Data successfully updated.'));
    }

    /**
     * Returning successfully deleted data response
     *
     * @param array $data
     * @return void
     */
    public function dataDeleted()
    {
        return $this->successResponse(null, __('Data successfully deleted.'));
    }
}
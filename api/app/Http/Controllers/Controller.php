<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use \App\Http\Requests\Outputs;
    
    /**
    * Prepare output.
    *
    * @return Array
    */
    protected function output(): JsonResponse
    {
        return response()->json($this->response);
    }

    /**
    * Throw exception.
    *
    * @return \Exception
    */
    protected function notValidRequest()
    {
        throw new \Exception(json_encode(['data' => ['request' => 'is_not_valid']]), 406);
    }
}

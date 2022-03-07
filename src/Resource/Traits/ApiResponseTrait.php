<?php


namespace Src\Resource\Traits;

use Illuminate\Http\Response;

trait ApiResponseTrait
{
    public function successResponse($data, int $code = Response::HTTP_OK)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    public function errorMessage($message, int $code)
    {
        return response(['error' => $message], $code)->header('Content-Type', 'application/json');
    }

    public function errorResponse($message, int $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}

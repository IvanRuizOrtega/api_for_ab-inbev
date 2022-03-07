<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Product\Infrastructure\Controllers\GetActiveProductController;
use Src\Resource\Traits\ApiResponseTrait;

final class GetActiveController extends Controller
{
    use ApiResponseTrait;

    private $controller;

    public function __construct(GetActiveProductController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke()
    {
        $response = $this->controller->__invoke();
        return $this->successResponse($response);
    }
}

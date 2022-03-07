<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Infrastructure\Controllers\GetAllCustomerController;
use Src\Resource\Traits\ApiResponseTrait;

final class GetAllController extends Controller
{
    use ApiResponseTrait;

    private $controller;

    public function __construct(GetAllCustomerController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke()
    {
        $response = $this->controller->__invoke();
        return $this->successResponse($response);
    }
}

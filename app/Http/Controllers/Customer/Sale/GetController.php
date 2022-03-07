<?php


namespace App\Http\Controllers\Customer\Sale;



use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Relationship\Sale\Infrastructure\Controllers\GetSaleController;
use Src\Resource\Traits\ApiResponseTrait;

final class GetController extends Controller
{
    use ApiResponseTrait;

    private $controller;

    public function __construct(GetSaleController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(string $customer)
    {
        return $this->successResponse($this->controller->__invoke($customer));
    }
}

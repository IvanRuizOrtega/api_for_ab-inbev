<?php


namespace App\Http\Controllers\Customer\Sale;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Controllers\DeleteCartController;
use Src\Gestion\Customer\Relationship\Sale\Infrastructure\Controllers\StoreSaleController;
use Src\Gestion\Customer\Relationship\Sale\Infrastructure\Response\SaleResponse;

final class StoreController extends Controller
{
    private $controller, $controllerCart;

    public function __construct(StoreSaleController $controller,
                                DeleteCartController $controllerCart)
    {
        $this->controller = $controller;
        $this->controllerCart = $controllerCart;
    }

    public function __invoke(string $customer)
    {
        $sale = $this->controller->__invoke($customer);
        $this->controllerCart->__invoke($customer);
        return SaleResponse::sale($sale);
    }
}

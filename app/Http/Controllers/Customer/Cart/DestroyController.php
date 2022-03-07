<?php


namespace App\Http\Controllers\Customer\Cart;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Controllers\DeleteCartController;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response\CartResponse;

final class DestroyController extends Controller
{
    private $controller;

    public function __construct(DeleteCartController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(string $customer)
    {
        $this->controller->__invoke($customer);
        return CartResponse::cart($customer);
    }
}

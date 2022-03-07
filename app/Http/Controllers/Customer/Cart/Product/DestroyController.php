<?php


namespace App\Http\Controllers\Customer\Cart\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response\CartResponse;
use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Infrastructure\Controllers\DeleteProductToCartController;

final class DestroyController extends Controller
{
    private $controller, $model;

    public function __construct(DeleteProductToCartController $controller,\App\Models\Customer $model)
    {
        $this->model = $model;
        $this->controller = $controller;
    }

    public function __invoke(string $customer,
                             string $product)
    {
        $this->model->findOrFail($customer);
        $this->controller->__invoke($customer, $product);
        return CartResponse::cart($customer);
    }
}

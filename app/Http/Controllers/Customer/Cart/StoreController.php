<?php


namespace App\Http\Controllers\Customer\Cart;

use Laravel\Lumen\Routing\Controller;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Controllers\AddToCartController;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response\CartResponse;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Validations\Requests\AddToCartRequest;

final class StoreController extends Controller
{
    private $controller, $model;

    public function __construct(AddToCartController $controller,
                                \App\Models\Product $model)
    {
        $this->controller = $controller;
        $this->model = $model;
    }

    public function __invoke(AddToCartRequest $request,
                             string $customer)
    {
        $product = $this->model->findOrFail($request->product);
        $this->controller->__invoke($customer,
            $product->id,
            $product->name,
            $request->amount,
            $product->price,
            $product->iva);
        return CartResponse::cart($customer);
    }
}

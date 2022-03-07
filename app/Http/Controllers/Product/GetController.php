<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Product\Infrastructure\Controllers\GetProductController;
use Src\Gestion\Product\Infrastructure\Response\ProductResponse;

final class GetController extends Controller
{
    private $controller;

    public function __construct(GetProductController $controller)
    {
        $this->controller = $controller;
    }
    public function __invoke(string $product)
    {
        $response = $this->controller->__invoke($product);
        return ProductResponse::product($response);
    }
}

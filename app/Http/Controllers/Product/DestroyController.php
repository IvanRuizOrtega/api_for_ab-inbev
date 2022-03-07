<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Product\Infrastructure\Controllers\DestroyProductController;
use Src\Resource\Traits\ApiResponseTrait;

final class DestroyController extends Controller
{
    use ApiResponseTrait;

    private $controller;

    public function __construct(DestroyProductController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(string $product)
    {
        return $this->controller->__invoke($product);
    }
}

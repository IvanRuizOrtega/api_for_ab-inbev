<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Product\Infrastructure\Controllers\UpdateProductController;
use Src\Gestion\Product\Infrastructure\Response\ProductResponse;
use Src\Gestion\Product\Infrastructure\Validations\Requests\UpdateProductRequest;

final class UpdateController extends Controller
{
    private $controller;

    public function __construct(UpdateProductController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(UpdateProductRequest $request,
                             string $product)
    {
        $response = $this->controller->__invoke($product,
            $request->price,
            $request->apply_iva,
            $request->is_active,
            $request->stock);
        return ProductResponse::product($response);
    }
}

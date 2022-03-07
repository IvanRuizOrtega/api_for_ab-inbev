<?php


namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Src\Gestion\Product\Infrastructure\Controllers\StoreProductController;
use Src\Gestion\Product\Infrastructure\Response\ProductResponse;
use Src\Gestion\Product\Infrastructure\Validations\Requests\StoreProductRequest;

final class StoreController extends Controller
{
    private $controller;

    public function __construct(StoreProductController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(StoreProductRequest $request)
    {
        $response = $this->controller->__invoke($request->name,
            $request->description,
            $request->file('image'),
            $request->price,
            $request->apply_iva,
            $request->is_active,
            $request->stock);
        return ProductResponse::product($response);
    }
}

<?php


namespace Src\Gestion\Product\Infrastructure\Response;


use Src\Gestion\Product\Domain\Model\Product;
use Src\Resource\Traits\ApiResponseTrait;

final class ProductResponse
{
    use ApiResponseTrait;

    public static function product(Product $product)
    {
        return (new ProductResponse)->successResponse([
            'id' => $product->getId()->value(),
            'sku' => $product->getSku()->value(),
            'name' => $product->getName()->value(),
            'description' => $product->getDescription()->value(),
            'path_image' => $product->getPathImage()->value(),
            'price' => $product->getPrice()->value(),
            'iva' => $product->getIva()->value(),
            'is_active' => $product->getIsActive()->value(),
            'stock' => $product->getStock()->value(),
            'created_at' => $product->getCreatedAt()->value(),
            'updated_at' => $product->getUpdatedAt()->value(),
            'type' => $product->getType()
        ]);
    }
}

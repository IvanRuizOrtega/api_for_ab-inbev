<?php


namespace Src\Gestion\Product\Domain\Contracts;


interface iUpdateProductRepositoryContract
{
    public function updateProduct(string $product,
                                  float $price,
                                  bool $iva,
                                  bool $is_active,
                                  int $stock);
}

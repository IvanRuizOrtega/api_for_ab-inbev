<?php


namespace Src\Gestion\Product\Domain\Contracts;


interface iStoreProductRepositoryContract
{
    public function storeProduct(string $name,
                                 string $description,
                                 $image,
                                 float $price,
                                 bool $iva,
                                 bool $is_active,
                                 int $stock);
}

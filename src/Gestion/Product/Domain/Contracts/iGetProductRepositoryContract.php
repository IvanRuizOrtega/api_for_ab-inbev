<?php


namespace Src\Gestion\Product\Domain\Contracts;


interface iGetProductRepositoryContract
{
    public function getProduct(string $product);
}

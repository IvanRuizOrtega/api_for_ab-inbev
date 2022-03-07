<?php


namespace Src\Gestion\Product\Domain\Contracts;


interface iDestroyProductRepositoryContract
{
    public function destroyProduct(string $product);
}

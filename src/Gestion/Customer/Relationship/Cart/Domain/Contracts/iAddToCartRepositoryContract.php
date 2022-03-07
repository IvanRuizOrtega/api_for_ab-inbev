<?php


namespace Src\Gestion\Customer\Relationship\Cart\Domain\Contracts;


interface iAddToCartRepositoryContract
{
    public function addToCart(string $customer,
                              string $product,
                              string $name,
                              int $amount,
                              int $unit_value,
                              bool $iva);
}

<?php


namespace Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Domain\Contracts;


interface iDestroyProductToCartRepositoryContract
{
    public function deleteProductToCart(string $customer,
                                        string $product);
}

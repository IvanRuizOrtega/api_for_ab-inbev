<?php


namespace Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Application;



use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Domain\Contracts\iDestroyProductToCartRepositoryContract;

final class DestroyProductToCartCase
{
    private $contract;

    public function __construct(iDestroyProductToCartRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $customer,
                             string $product)
    {
        return $this->contract->deleteProductToCart($customer,
            $product);
    }
}

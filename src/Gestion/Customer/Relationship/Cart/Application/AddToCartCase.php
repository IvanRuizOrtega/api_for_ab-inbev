<?php


namespace Src\Gestion\Customer\Relationship\Cart\Application;


use Src\Gestion\Customer\Relationship\Cart\Domain\Contracts\iAddToCartRepositoryContract;

final class AddToCartCase
{
    private $contract;

    public function __construct(iAddToCartRepositoryContract $contract)
    {
        $this->contract = $contract;
    }
    public function __invoke(string $customer,
                             string $product,
                             string $name,
                             int $amount,
                             int $unit_value,
                             bool $iva)
    {
        return $this->contract->addToCart($customer,
            $product,
            $name,
            $amount,
            $unit_value,
            $iva);
    }
}

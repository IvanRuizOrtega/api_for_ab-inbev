<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Controllers;



use Src\Gestion\Customer\Relationship\Cart\Application\AddToCartCase;

final class AddToCartController
{
    private $case;

    public function __construct(AddToCartCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer,
                             string $product,
                             string $name,
                             int $amount,
                             int $unit_value,
                             bool $iva)
    {
        return $this->case->__invoke($customer,
            $product,
            $name,
            $amount,
            $unit_value,
            $iva);
    }
}

<?php


namespace Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Infrastructure\Controllers;



use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Application\DestroyProductToCartCase;

final class DeleteProductToCartController
{
    private $case;

    public function __construct(DestroyProductToCartCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer,
                             string $product)
    {
        return $this->case->__invoke($customer,
            $product);
    }
}

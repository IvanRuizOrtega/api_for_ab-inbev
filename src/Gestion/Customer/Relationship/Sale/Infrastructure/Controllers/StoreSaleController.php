<?php


namespace Src\Gestion\Customer\Relationship\Sale\Infrastructure\Controllers;


use Src\Gestion\Customer\Relationship\Sale\Application\StoreSaleCase;

final class StoreSaleController
{
    private $case;

    public function __construct(StoreSaleCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer)
    {
        return $this->case->__invoke($customer);
    }
}

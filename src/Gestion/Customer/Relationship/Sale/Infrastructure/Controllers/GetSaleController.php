<?php


namespace Src\Gestion\Customer\Relationship\Sale\Infrastructure\Controllers;


use Src\Gestion\Customer\Relationship\Sale\Application\GetSaleCase;

final class GetSaleController
{
    private $case;

    public function __construct(GetSaleCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer)
    {
        return $this->case->__invoke($customer);
    }
}

<?php


namespace Src\Gestion\Customer\Relationship\Sale\Application;


use Src\Gestion\Customer\Relationship\Sale\Domain\Contracts\iGetSaleRepositoryContract;

final class GetSaleCase
{
    private $contract;

    public function __construct(iGetSaleRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $customer)
    {
        return $this->contract->getSales($customer);
    }
}

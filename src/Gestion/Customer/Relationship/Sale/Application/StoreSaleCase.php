<?php


namespace Src\Gestion\Customer\Relationship\Sale\Application;


use Src\Gestion\Customer\Relationship\Sale\Domain\Contracts\iStoreSaleRepositoryContract;

final class StoreSaleCase
{
    private $contract;

    public function __construct(iStoreSaleRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $customer)
    {
        return $this->contract->storeSale($customer);
    }
}

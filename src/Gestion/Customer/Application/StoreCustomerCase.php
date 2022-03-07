<?php


namespace Src\Gestion\Customer\Application;


use Src\Gestion\Customer\Domain\Contracts\iStoreCustomerRepositoryContract;

final class StoreCustomerCase
{
    private $contract;

    public function __construct(iStoreCustomerRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $name,
                             string $phone,
                             string $email)
    {
        return $this->contract->storeCustomer($name,
            $phone,
            $email);
    }
}

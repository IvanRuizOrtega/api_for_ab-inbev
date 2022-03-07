<?php


namespace Src\Gestion\Customer\Application;


use Src\Gestion\Customer\Domain\Contracts\iUpdateCustomerRepositoryContract;

final class UpdateCustomerCase
{
    private $contract;

    public function __construct(iUpdateCustomerRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $customer,
                             string $phone,
                             string $email)
    {
        return $this->contract->updateCustomer($customer,
            $phone,
            $email);
    }
}

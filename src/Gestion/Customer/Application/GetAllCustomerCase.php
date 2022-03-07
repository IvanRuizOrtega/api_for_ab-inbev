<?php


namespace Src\Gestion\Customer\Application;


use Src\Gestion\Customer\Domain\Contracts\iGetAllCustomersRepositoryContract;

final class GetAllCustomerCase
{
    private $contract;

    public function __construct(iGetAllCustomersRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke()
    {
        return $this->contract->getAllCustomers();
    }
}

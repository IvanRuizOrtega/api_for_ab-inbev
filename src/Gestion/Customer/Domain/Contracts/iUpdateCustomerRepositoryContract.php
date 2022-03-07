<?php


namespace Src\Gestion\Customer\Domain\Contracts;


interface iUpdateCustomerRepositoryContract
{
    public function updateCustomer(string $customer,
                                  string $phone,
                                  string $email);
}

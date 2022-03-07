<?php


namespace Src\Gestion\Customer\Domain\Contracts;


interface iStoreCustomerRepositoryContract
{
    public function storeCustomer(string $name,
                                  string $phone,
                                  string $email);
}

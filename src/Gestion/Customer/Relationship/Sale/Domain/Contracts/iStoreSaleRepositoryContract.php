<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\Contracts;


interface iStoreSaleRepositoryContract
{
    public function storeSale(string $customer);
}

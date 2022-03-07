<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\Contracts;


interface iGetSaleRepositoryContract
{
    public function getSales(string $customer);
}

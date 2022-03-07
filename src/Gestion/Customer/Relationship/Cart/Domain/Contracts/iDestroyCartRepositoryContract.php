<?php


namespace Src\Gestion\Customer\Relationship\Cart\Domain\Contracts;


interface iDestroyCartRepositoryContract
{
    public function deleteCart($customer);
}

<?php


namespace Src\Gestion\Customer\Relationship\Cart\Application;


use Src\Gestion\Customer\Relationship\Cart\Domain\Contracts\iDestroyCartRepositoryContract;

final class DestroyCartCase
{
    private $contract;

    public function __construct(iDestroyCartRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $customer)
    {
        return $this->contract->deleteCart($customer);
    }
}

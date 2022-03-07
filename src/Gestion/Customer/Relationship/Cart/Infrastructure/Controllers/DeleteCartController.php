<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Controllers;


use Src\Gestion\Customer\Relationship\Cart\Application\DestroyCartCase;

final class DeleteCartController
{
    private $case;

    public function __construct(DestroyCartCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer)
    {
        return $this->case->__invoke($customer);
    }
}

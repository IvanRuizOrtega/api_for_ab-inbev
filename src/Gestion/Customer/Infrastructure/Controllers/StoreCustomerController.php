<?php


namespace Src\Gestion\Customer\Infrastructure\Controllers;


use Src\Gestion\Customer\Application\StoreCustomerCase;

final class StoreCustomerController
{
    private $case;

    public function __construct(StoreCustomerCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $name,
                             string $phone,
                             string $email)
    {
        return $this->case->__invoke($name,
            $phone,
            $email);
    }
}

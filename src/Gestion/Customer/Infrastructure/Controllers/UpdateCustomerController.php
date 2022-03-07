<?php


namespace Src\Gestion\Customer\Infrastructure\Controllers;


use Src\Gestion\Customer\Application\UpdateCustomerCase;

final class UpdateCustomerController
{
    private $case;

    public function __construct(UpdateCustomerCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $customer,
                             string $phone,
                             string $email)
    {
        return $this->case->__invoke($customer,
            $phone,
            $email);
    }
}

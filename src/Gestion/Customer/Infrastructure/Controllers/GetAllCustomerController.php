<?php


namespace Src\Gestion\Customer\Infrastructure\Controllers;


use Src\Gestion\Customer\Application\GetAllCustomerCase;

final class GetAllCustomerController
{
    private $case;

    public function __construct(GetAllCustomerCase $case)
    {
        $this->case = $case;
    }

    public function __invoke()
    {
        return $this->case->__invoke();
    }
}

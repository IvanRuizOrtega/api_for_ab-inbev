<?php


namespace Src\Gestion\Product\Infrastructure\Controllers;


use Src\Gestion\Product\Application\GetActiveProductCase;

final class GetActiveProductController
{
    private $case;

    public function __construct(GetActiveProductCase $case)
    {
        $this->case = $case;
    }

    public function __invoke()
    {
        return $this->case->__invoke();
    }
}

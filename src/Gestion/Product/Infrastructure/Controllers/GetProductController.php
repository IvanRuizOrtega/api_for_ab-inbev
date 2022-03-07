<?php


namespace Src\Gestion\Product\Infrastructure\Controllers;


use Src\Gestion\Product\Application\GetProductCase;

final class GetProductController
{
    private $case;

    public function __construct(GetProductCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $product)
    {
        return $this->case->__invoke($product);
    }
}

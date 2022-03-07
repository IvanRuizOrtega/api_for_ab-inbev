<?php


namespace Src\Gestion\Product\Infrastructure\Controllers;


use Src\Gestion\Product\Application\DestroyProductCase;

final class DestroyProductController
{
    private $case;

    public function __construct(DestroyProductCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $product)
    {
        return $this->case->__invoke($product);
    }
}

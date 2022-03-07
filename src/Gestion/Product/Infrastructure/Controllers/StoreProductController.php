<?php


namespace Src\Gestion\Product\Infrastructure\Controllers;


use Src\Gestion\Product\Application\StoreProductCase;

final class StoreProductController
{
    private $case;

    public function __construct(StoreProductCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $name,
                             string $description,
                             $image,
                             float $price,
                             bool $iva,
                             bool $is_active,
                             int $stock)
    {
        return $this->case->__invoke($name,
            $description,
            $image,
            $price,
            $iva,
            $is_active,
            $stock);
    }
}

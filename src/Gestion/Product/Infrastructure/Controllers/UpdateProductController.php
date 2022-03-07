<?php


namespace Src\Gestion\Product\Infrastructure\Controllers;


use Src\Gestion\Product\Application\UpdateProductCase;

final class UpdateProductController
{
    private $case;

    public function __construct(UpdateProductCase $case)
    {
        $this->case = $case;
    }

    public function __invoke(string $product,
                             float $price,
                             bool $iva,
                             bool $is_active,
                             int $stock)
    {
        return $this->case->__invoke($product,
            $price,
            $iva,
            $is_active,
            $stock);
    }
}

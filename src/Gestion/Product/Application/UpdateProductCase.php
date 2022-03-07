<?php


namespace Src\Gestion\Product\Application;


use Src\Gestion\Product\Domain\Contracts\iUpdateProductRepositoryContract;

final class UpdateProductCase
{
    private $contract;

    public function __construct(iUpdateProductRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $product,
                             float $price,
                             bool $iva,
                             bool $is_active,
                             int $stock)
    {
        return $this->contract->updateProduct($product,
            $price,
            $iva,
            $is_active,
            $stock);
    }
}

<?php


namespace Src\Gestion\Product\Application;


use Src\Gestion\Product\Domain\Contracts\iStoreProductRepositoryContract;

final class StoreProductCase
{
    private $contract;

    public function __construct(iStoreProductRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $name,
                             string $description,
                             $image,
                             float $price,
                             bool $iva,
                             bool $is_active,
                             int $stock)
    {
        return $this->contract->storeProduct($name,
            $description,
            $image,
            $price,
            $iva,
            $is_active,
            $stock);
    }
}

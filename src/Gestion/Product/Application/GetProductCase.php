<?php


namespace Src\Gestion\Product\Application;


use Src\Gestion\Product\Domain\Contracts\iGetProductRepositoryContract;

final class GetProductCase
{
    private $contract;

    public function __construct(iGetProductRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $product)
    {
        return $this->contract->getProduct($product);
    }
}

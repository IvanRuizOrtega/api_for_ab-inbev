<?php


namespace Src\Gestion\Product\Application;



use Src\Gestion\Product\Domain\Contracts\iDestroyProductRepositoryContract;

final class DestroyProductCase
{
    private $contract;

    public function __construct(iDestroyProductRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke(string $product)
    {
        return $this->contract->destroyProduct($product);
    }
}

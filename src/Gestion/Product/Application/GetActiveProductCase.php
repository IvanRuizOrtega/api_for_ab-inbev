<?php


namespace Src\Gestion\Product\Application;


use Src\Gestion\Product\Domain\Contracts\iGetActiveProductRepositoryContract;

final class GetActiveProductCase
{
    private $contract;

    public function __construct(iGetActiveProductRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function __invoke()
    {
        return $this->contract->getActiveProducts();
    }
}

<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Stock implements iValue
{
    private $stock;

    public function __construct(int $stock)
    {
        $this->stock = $stock;
    }

    public function value(): int
    {
        return $this->stock;
    }
}

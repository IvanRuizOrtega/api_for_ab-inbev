<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Price implements iValue
{
    private $price;

    public function __construct(float $price)
    {
        $this->price = $price;
    }

    public function value(): float
    {
        return $this->price;
    }
}

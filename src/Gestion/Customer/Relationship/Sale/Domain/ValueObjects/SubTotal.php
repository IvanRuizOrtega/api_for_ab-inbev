<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class SubTotal implements iValue
{
    private $subTotal;

    public function __construct(float $subTotal)
    {
        $this->subTotal = $subTotal;
    }

    public function value(): float
    {
        return number_format($this->subTotal,2, '.', ',');
    }
}

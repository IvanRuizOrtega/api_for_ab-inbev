<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Total implements iValue
{
    private $total;

    public function __construct(float $total)
    {
        $this->total = $total;
    }

    public function value(): float
    {
       return number_format($this->total, 2, '.', ',');
    }
}

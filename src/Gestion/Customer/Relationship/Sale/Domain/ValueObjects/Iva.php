<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Iva implements iValue
{
    private $iva;

    public function __construct(float $ivan)
    {
        $this->iva = $ivan;
    }

    public function value(): float
    {
        return number_format($this->iva, 2, '.', ',');
    }
}

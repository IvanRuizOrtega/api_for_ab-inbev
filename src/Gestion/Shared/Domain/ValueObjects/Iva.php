<?php


namespace Src\Gestion\Shared\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Iva implements iValue
{
    private $iva;

    public function __construct(bool $iva)
    {
        $this->iva = $iva;
    }

    public function value(): bool
    {
        return $this->iva;
    }
}

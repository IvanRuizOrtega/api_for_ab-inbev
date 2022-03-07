<?php


namespace Src\Gestion\Shared\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Id implements iValue
{
    private $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function value(): string
    {
        return $this->id;
    }
}

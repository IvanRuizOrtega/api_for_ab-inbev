<?php


namespace Src\Gestion\Shared\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Name implements iValue
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function value(): string
    {
        return $this->name;
    }
}

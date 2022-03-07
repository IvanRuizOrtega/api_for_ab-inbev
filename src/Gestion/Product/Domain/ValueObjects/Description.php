<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Description implements iValue
{
    private $description;

    public function __construct(?string $description)
    {
        $this->description = $description;
    }

    public function value(): ?string
    {
        return $this->description;
    }
}

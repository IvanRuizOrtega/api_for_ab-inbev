<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class IsActive implements iValue
{
    private $isActive;

    public function __construct(bool $isActive)
    {
        $this->isActive = $isActive;
    }

    public function value(): bool
    {
        return $this->isActive;
    }
}

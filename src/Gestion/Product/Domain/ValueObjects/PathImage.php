<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class PathImage implements iValue
{
    private $path;

    public function __construct(?string $path)
    {
        $this->path = $path;
    }

    public function value(): ?string
    {
       return $this->path;
    }
}

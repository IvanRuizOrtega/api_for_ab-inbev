<?php


namespace Src\Gestion\Customer\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Phone implements iValue
{
    private $phone;

    public function __construct(string $phone)
    {
        $this->phone = $phone;
    }

    public function value(): ?string
    {
       return $this->phone;
    }
}

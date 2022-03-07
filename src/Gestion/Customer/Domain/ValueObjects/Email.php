<?php


namespace Src\Gestion\Customer\Domain\ValueObjects;


use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class Email implements iValue
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;
    }

    public function value(): string
    {
        return $this->email;
    }
}

<?php


namespace Src\Gestion\Shared\Domain\ValueObjects;


use DateTime;
use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class CreatedAt implements iValue
{
    private $createdAt;

    public function __construct(DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function value(): DateTime
    {
       return $this->createdAt;
    }
}

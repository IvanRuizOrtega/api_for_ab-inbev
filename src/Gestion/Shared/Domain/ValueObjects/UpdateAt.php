<?php


namespace Src\Gestion\Shared\Domain\ValueObjects;


use DateTime;
use Src\Gestion\Shared\Domain\Interfaces\iValue;

final class UpdateAt implements iValue
{
    private $updatedAt;

    public function __construct(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function value(): DateTime
    {
       return $this->updatedAt;
    }
}

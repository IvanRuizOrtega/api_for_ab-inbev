<?php


namespace Src\Gestion\Shared\Domain\Interfaces;


use Src\Gestion\Shared\Domain\ValueObjects\{CreatedAt,
    UpdateAt};

interface iTimestamp
{
    public function getCreatedAt(): CreatedAt;
    public function getUpdatedAt(): UpdateAt;
    public function getType(): string;
}

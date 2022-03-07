<?php


namespace Src\Gestion\Shared\Domain\Interfaces;


use Src\Gestion\Shared\Domain\ValueObjects\Id;

interface iId
{
    public function getId(): Id;
}

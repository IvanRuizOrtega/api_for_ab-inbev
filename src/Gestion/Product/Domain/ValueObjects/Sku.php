<?php


namespace Src\Gestion\Product\Domain\ValueObjects;


use Src\Gestion\Product\Infrastructure\Validations\ExistSkuValidation;
use Src\Gestion\Shared\Domain\Interfaces\iValue;
use Src\Gestion\Shared\Domain\ValueObjects\Name;

final class Sku implements iValue
{
    private $sku;

    public function __construct(?Name $name,
                                ?Description $description,
                                bool $isResponse = false,
                                ?string $sku = '')
    {
        if ($isResponse) {
            $this->sku = $sku;
        } else {
            $this->sku = strtoupper(substr($name->value(), 0, 3)).'-'.
                strtoupper(substr($description->value(), 0, 2)).'-'.
                date("Y");
            ExistSkuValidation::passes($this->sku);
        }
    }

    public function value(): string
    {
        return $this->sku;
    }
}

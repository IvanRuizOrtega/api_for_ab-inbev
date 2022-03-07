<?php


namespace Src\Gestion\Customer\Relationship\Sale\Infrastructure\Response;


use Src\Gestion\Customer\Relationship\Sale\Domain\Model\Sale;
use Src\Resource\Traits\ApiResponseTrait;

final class SaleResponse
{
    use ApiResponseTrait;

    public static function sale(?Sale $sale)
    {
        if (!is_null($sale)) {
            return (new SaleResponse)->successResponse([
                'id' => $sale->getId()->value(),
                'iva' => $sale->getIva()->value(),
                'sub_total' => $sale->getSubTotal()->value(),
                'total' => $sale->getTotal()->value(),
                'created_at' => $sale->getCreatedAt()->value(),
                'updated_at' => $sale->getUpdatedAt()->value(),
                'type' => $sale->getType()
            ]);
        }
        return (new SaleResponse)->errorMessage('Sorry not exist cart', 406);
    }
}

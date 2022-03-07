<?php


namespace Src\Gestion\Customer\Infrastructure\Response;


use Src\Gestion\Customer\Domain\Model\Customer;
use Src\Resource\Traits\ApiResponseTrait;

final class CustomerResponse
{
    use ApiResponseTrait;

    public static function customer(Customer $customer)
    {
        return (new CustomerResponse)->successResponse([
            'id' => $customer->getId()->value(),
            'name' => $customer->getName()->value(),
            'phone' => $customer->getPhone()->value(),
            'email' => $customer->getEmail()->value(),
            'created_at' => $customer->getCreatedAt()->value(),
            'updated_at' => $customer->getUpdatedAt()->value(),
            'type' => $customer->getType()
        ]);
    }
}

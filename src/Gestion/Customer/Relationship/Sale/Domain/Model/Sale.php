<?php


namespace Src\Gestion\Customer\Relationship\Sale\Domain\Model;


use Src\Gestion\Customer\Relationship\Sale\Domain\ValueObjects\{Iva,
    SubTotal,
    Total};
use Src\Gestion\Shared\Domain\ValueObjects\{Id,
    CreatedAt,
    UpdateAt};
use Src\Gestion\Shared\Domain\Interfaces\{iId,
    iTimestamp,
    iTypeRepository};

final class Sale implements iTimestamp, iTypeRepository, iId
{
    private $id,
        $iva,
        $subTotal,
        $total,
        $created_at,
        $updated_at,
        $type;

    public function __construct(Id $id,
                                Iva $iva,
                                SubTotal $subTotal,
                                Total $total,
                                CreatedAt $created_at,
                                UpdateAt $updated_at,
                                string $type = null)
    {
        $this->id = $id;
        $this->iva = $iva;
        $this->subTotal = $subTotal;
        $this->total = $total;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->type = $type;
    }

    /**
     * @return Id
     */
    public function getId(): Id
    {
        return $this->id;
    }

    /**
     * @return Iva
     */
    public function getIva(): Iva
    {
        return $this->iva;
    }

    /**
     * @return SubTotal
     */
    public function getSubTotal(): SubTotal
    {
        return $this->subTotal;
    }

    /**
     * @return Total
     */
    public function getTotal(): Total
    {
        return $this->total;
    }

    /**
     * @return CreatedAt
     */
    public function getCreatedAt(): CreatedAt
    {
        return $this->created_at;
    }

    /**
     * @return UpdateAt
     */
    public function getUpdatedAt(): UpdateAt
    {
        return $this->updated_at;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}

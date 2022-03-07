<?php


namespace Src\Gestion\Product\Domain\Model;


use Src\Gestion\Product\Domain\ValueObjects\{Sku,
    Description,
    PathImage,
    Price,
    IsActive,
    Stock};
use Src\Gestion\Shared\Domain\ValueObjects\{Id,
    Name,
    Iva,
    CreatedAt,
    UpdateAt};
use Src\Gestion\Shared\Domain\Interfaces\{iId,
    iTimestamp,
    iTypeRepository};

final class Product  implements iId, iTimestamp, iTypeRepository
{
    private $id,
        $sku,
        $name,
        $description,
        $path_image,
        $price,
        $iva,
        $is_active,
        $stock,
        $created_at,
        $updated_at,
        $type;

    public function __construct(Id $id,
                                Sku $sku,
                                Name $name,
                                Description $description,
                                PathImage $path_image,
                                Price $price,
                                Iva $iva,
                                IsActive $is_active,
                                Stock $stock,
                                CreatedAt $created_at,
                                UpdateAt $updated_at,
                                string $type = null)
    {
        $this->id = $id;
        $this->sku = $sku;
        $this->name = $name;
        $this->description = $description;
        $this->path_image = $path_image;
        $this->price = $price;
        $this->iva = $iva;
        $this->is_active = $is_active;
        $this->stock = $stock;
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
     * @return Sku
     */
    public function getSku(): Sku
    {
        return $this->sku;
    }

    /**
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Description
     */
    public function getDescription(): Description
    {
        return $this->description;
    }

    /**
     * @return PathImage
     */
    public function getPathImage(): PathImage
    {
        return $this->path_image;
    }

    /**
     * @return Price
     */
    public function getPrice(): Price
    {
        return $this->price;
    }

    /**
     * @return Iva
     */
    public function getIva(): Iva
    {
        return $this->iva;
    }

    /**
     * @return IsActive
     */
    public function getIsActive(): IsActive
    {
        return $this->is_active;
    }

    /**
     * @return Stock
     */
    public function getStock(): Stock
    {
        return $this->stock;
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

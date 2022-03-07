<?php


namespace Src\Gestion\Customer\Domain\Model;


use Src\Gestion\Customer\Domain\ValueObjects\{Email,
    Phone};
use Src\Gestion\Shared\Domain\ValueObjects\{Id,
    Name,
    CreatedAt,
    UpdateAt};
use Src\Gestion\Shared\Domain\Interfaces\{iId,
    iTimestamp,
    iTypeRepository};

final class Customer implements iTimestamp, iTypeRepository, iId
{
    private $id,
        $name,
        $email,
        $phone,
        $created_at,
        $updated_at,
        $type;

    public function __construct(Id $id,
                                Name $name,
                                Email $email,
                                Phone $phone,
                                CreatedAt $created_at,
                                UpdateAt $updated_at,
                                string $type = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
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
     * @return Name
     */
    public function getName(): Name
    {
        return $this->name;
    }

    /**
     * @return Email
     */
    public function getEmail(): Email
    {
        return $this->email;
    }

    /**
     * @return Phone
     */
    public function getPhone(): Phone
    {
        return $this->phone;
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

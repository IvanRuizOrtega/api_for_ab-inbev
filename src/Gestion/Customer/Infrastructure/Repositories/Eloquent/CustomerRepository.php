<?php


namespace Src\Gestion\Customer\Infrastructure\Repositories\Eloquent;

use Src\Gestion\Customer\Domain\Contracts\{iGetAllCustomersRepositoryContract,
    iStoreCustomerRepositoryContract,
    iUpdateCustomerRepositoryContract};
use Src\Gestion\Shared\Domain\ValueObjects\{Id,
    Name,
    CreatedAt,
    UpdateAt};
use Src\Gestion\Customer\Domain\ValueObjects\{Email,
    Phone};
use Src\Gestion\Customer\Domain\Model\Customer;
use Src\Resource\Constants\RepositoryType;



final class CustomerRepository implements iGetAllCustomersRepositoryContract,
    iStoreCustomerRepositoryContract,
    iUpdateCustomerRepositoryContract
{
    private $model;

    public function __construct(\App\Models\Customer $model)
    {
        $this->model = $model;
    }

    public function getAllCustomers()
    {
        return $this->model->all();
    }

    public function storeCustomer(string $name,
                                  string $phone,
                                  string $email): Customer
    {
        $setName = new Name($name);
        $setPhone = new Phone($phone);
        $setEmail = new Email($email);
        $response = $this->model->create([
            'name' => $setName->value(),
            'phone' => $setPhone->value(),
            'email' => $setEmail->value()
        ]);

        return new Customer(new Id($response->id),
            $setName,
            $setEmail,
            $setPhone,
            new CreatedAt($response->created_at),
            new UpdateAt($response->updated_at),
            RepositoryType::ELOQUENT_TYPE);
    }

    public function updateCustomer(string $customer,
                                   string $phone,
                                   string $email): Customer
    {
        $setId = new Id($customer);
        $response = $this->model->findOrFail($setId->value());
        $setPhone = new Phone($phone);
        $setEmail = new Email($email);
        $response->update([
            'phone' => $setPhone->value(),
            'email' => $setEmail->value()
        ]);
        return new Customer(new Id($response->id),
            new Name($response->name) ,
            $setEmail,
            $setPhone,
            new CreatedAt($response->created_at),
            new UpdateAt($response->updated_at),
            RepositoryType::ELOQUENT_TYPE);
    }
}

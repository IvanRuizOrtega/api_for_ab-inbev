<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Infrastructure\Controllers\UpdateCustomerController;
use Src\Gestion\Customer\Infrastructure\Response\CustomerResponse;
use Src\Gestion\Customer\Infrastructure\Validations\Requests\UpdateCustomerRequest;

final class UpdateController extends Controller
{
    private $controller;

    public function __construct(UpdateCustomerController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(UpdateCustomerRequest $request,
                             string $customer)
    {
        $response = $this->controller->__invoke($customer,
            $request->phone_number,
            $request->email);
        return CustomerResponse::customer($response);
    }
}

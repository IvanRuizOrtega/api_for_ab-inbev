<?php


namespace App\Http\Controllers\Customer;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Infrastructure\Controllers\StoreCustomerController;
use Src\Gestion\Customer\Infrastructure\Response\CustomerResponse;
use Src\Gestion\Customer\Infrastructure\Validations\Requests\StoreCustomerRequest;

final class StoreController extends Controller
{
    private $controller;

    public function __construct(StoreCustomerController $controller)
    {
        $this->controller = $controller;
    }

    public function __invoke(StoreCustomerRequest $request)
    {
        $response = $this->controller->__invoke($request->name,
            $request->phone_number,
            $request->email);
        return CustomerResponse::customer($response);
    }
}

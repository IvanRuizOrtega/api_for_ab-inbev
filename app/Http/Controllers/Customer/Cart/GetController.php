<?php


namespace App\Http\Controllers\Customer\Cart;


use App\Http\Controllers\Controller;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response\CartResponse;

final class GetController extends Controller
{
    public function __invoke(string $customer)
    {
        return CartResponse::cart($customer);
    }
}

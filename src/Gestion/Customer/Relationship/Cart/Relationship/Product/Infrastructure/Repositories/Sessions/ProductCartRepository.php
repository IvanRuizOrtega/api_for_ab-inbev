<?php


namespace Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Infrastructure\Repositories\Sessions;



use Src\Gestion\Customer\Relationship\Cart\Relationship\Product\Domain\Contracts\iDestroyProductToCartRepositoryContract;

final class ProductCartRepository implements iDestroyProductToCartRepositoryContract
{

    public function deleteProductToCart(string $customer,
                                        string $product)
    {
        $cart = request()->session()->get($customer);
        if ($cart) {
            if (array_key_exists($product, $cart)) {
                unset($cart[$product]);
                request()->session()->put($customer, $cart);
            }
        }
    }
}

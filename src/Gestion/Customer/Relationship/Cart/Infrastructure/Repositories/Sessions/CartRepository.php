<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Repositories\Sessions;


use Src\Gestion\Customer\Relationship\Cart\Domain\Contracts\{iAddToCartRepositoryContract,
    iDestroyCartRepositoryContract};

final class CartRepository implements iAddToCartRepositoryContract,
    iDestroyCartRepositoryContract
{
    public function addToCart(string $customer,
                              string $product,
                              string $name,
                              int $amount,
                              int $unit_value,
                              bool $iva)
    {
        $cart = request()->session()->get($customer);
        if (!$cart) {
            self::addFistProductToCart($customer,
                $product,
                $name,
                $amount,
                $unit_value,
                $iva);
            return;
        }
        if (array_key_exists($product, $cart)) {
            $cart[$product]['amount'] =  $amount;
            $cart[$product]['full_value'] =  $iva ?
                number_format((($unit_value * $amount) * 1.19), 2, '.', ',') :
                number_format(($unit_value * $amount), 2, '.', ',');
        } else {
            $cart[$product] = [
                'name' => $name,
                'amount' => $amount,
                'unit_value' => $unit_value,
                'iva' => $iva,
                'full_value' =>  $iva ?
                    number_format((($unit_value * $amount) * 1.19), 2, '.', ',') :
                    number_format(($unit_value * $amount), 2, '.', ',')
            ];
        }
        request()->session()->put($customer, $cart);
    }
    private static function addFistProductToCart(string $customer,
                                                 string $product,
                                                 string $name,
                                                 int $amount,
                                                 int $unit_value,
                                                 bool $iva) {
        $element = [
            $product => [
                'name' => $name,
                'amount' => $amount,
                'unit_value' => $unit_value,
                'iva' => $iva,
                'full_value' =>  $iva ?
                    number_format((($unit_value * $amount) * 1.19), 2, '.', ',') :
                    number_format(($unit_value * $amount), 2, '.', ',')
            ]
        ];
        request()->session()->put($customer, $element);
    }

    public function deleteCart($customer)
    {
        request()->session()->forget($customer);
    }
}

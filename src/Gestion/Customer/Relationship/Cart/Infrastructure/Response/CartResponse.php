<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Response;


use Src\Resource\Traits\ApiResponseTrait;

final class CartResponse
{
    use ApiResponseTrait;

    public static function cart(string $customer)
    {
       $cart = request()->session()->get($customer);
        if (!is_null($cart)) {
            $total = null;
            foreach ($cart as $element) {
                $total = number_format($total + $element['full_value'], 2, '.', ',');
            }
            $sub_total = ($total / 1.19);
            $cart['partial_sale'] = [
                'sub_total' => number_format($sub_total, 2,'.', ','),
                'iva' => number_format(($sub_total * 0.19), 2, '.', ',') ,
                'total' => number_format($total, 2,'.', ','),
            ];
            return array_filter($cart);
        }
        return (new CartResponse)->errorMessage('Sorry not exist cart', 406);
    }
}

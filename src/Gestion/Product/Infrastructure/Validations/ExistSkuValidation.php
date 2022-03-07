<?php


namespace Src\Gestion\Product\Infrastructure\Validations;


use App\Models\Product;

final class ExistSkuValidation
{
    public static function passes(string $sku) {
        if(Product::where('sku', $sku)->first()) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'sku' => [
                    "The sku has already been taken.",
                    "better update the stock."
                ],
            ]);
        }
    }
}

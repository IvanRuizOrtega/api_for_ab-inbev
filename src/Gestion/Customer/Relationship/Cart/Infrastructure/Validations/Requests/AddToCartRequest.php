<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;
use Src\Gestion\Customer\Relationship\Cart\Infrastructure\Validations\Rules\ProductAvailableRule;

final class AddToCartRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'product' => ['required',
                'exists:products,id',
                new ProductAvailableRule],
            'amount' => ['required',
                'numeric',
                'min:1',
                function($attributes, $value, $fail) {
                    if ($value > \App\Models\Product::findOrFail($this->product)->stock) {
                        $fail("The $attributes exceed stock.");
                    }
                }],
        ];
    }
}

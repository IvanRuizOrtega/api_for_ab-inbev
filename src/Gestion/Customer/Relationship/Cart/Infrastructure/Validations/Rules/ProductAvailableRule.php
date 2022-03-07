<?php


namespace Src\Gestion\Customer\Relationship\Cart\Infrastructure\Validations\Rules;


use Illuminate\Contracts\Validation\Rule;

final class ProductAvailableRule implements Rule
{
    public function passes($attribute, $value): bool
    {
      return (bool) \App\Models\Product::findOrFail($value)->is_active == true;
    }

    public function message(): string
    {
        return 'The :attribute is not available.';
    }
}

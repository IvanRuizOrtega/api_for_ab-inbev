<?php


namespace Src\Gestion\Product\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;

final class UpdateProductRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'price' => ['required',
                'numeric',
                'min:100',
                'max:1000000'],
            'apply_iva' => ['required',
                'boolean'],
            'is_active' => ['required',
                'boolean'],
            'stock' => ['required',
                'numeric',
                'min:1']
        ];
    }
}

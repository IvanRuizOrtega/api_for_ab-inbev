<?php


namespace Src\Gestion\Product\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;

final class StoreProductRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'name' => ['required',
                'string',
                'unique:products'],
            'description' => ['required',
                'string',
                'max:255'],
            'image' => ['required',
                'mimetypes:image/jpeg',
            ],
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

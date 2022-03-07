<?php


namespace Src\Gestion\Customer\Relationship\Sale\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;

final class StoreSaleRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'product' => ['required',],
            'amount' => ['required',
                'numeric',
                'min:1'
            ],
        ];
    }
}

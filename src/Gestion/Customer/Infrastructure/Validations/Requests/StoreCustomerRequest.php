<?php


namespace Src\Gestion\Customer\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;

final class StoreCustomerRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'name' => ['required',
                'string',
                'max:250'],
            'phone_number' => ['required',
                'digits:10',
                'unique:customers,phone'],
            'email' => ['required',
                'email',
                'unique:customers']
        ];
    }
}

<?php


namespace Src\Gestion\Customer\Infrastructure\Validations\Requests;


use Anik\Form\FormRequest;

final class UpdateCustomerRequest extends FormRequest
{
    protected function rules(): array
    {
        return [
            'phone_number' => ['required',
                'digits:10',
                'unique:customers,phone,'.$this->customer.',id'],
            'email' => ['required',
                'email',
                'unique:customers,email,'.$this->customer.',id']
        ];
    }
}

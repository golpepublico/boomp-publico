<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|string|max:100',
            'payment_option' => 'required|string|max:100',
            'cpfCnpj'       => 'required|cpf_ou_cnpj|max:20',
            'email'         => 'required|string|email:rfc,dns|max:100',
            'mobilePhone'   => 'required|celular_com_ddd|max:20',
            'postalCode'    => 'required|formato_cep|max:10',
            'state'         => 'required|string|uf|max:2',
            'city'          => 'required|string|max:100',
            'address'       => 'required|string|max:100',
            'addressNumber' => 'required|string|max:10',
            'province'      => 'required|string|max:100',
            'complement'    => 'max:50'
        ];
    }

    public function messages()
    {
        return [
            'payment_option.required' => 'Selecione a forma de pagamento'
        ];
    }
}
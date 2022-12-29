<?php

namespace App\Http\Requests;

use App\Models\BusinessPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBusinessPartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_partner_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'company_name' => [
                'string',
                'nullable',
            ],
            'cnpj_cpf' => [
                'string',
                'required',
                'unique:business_partners',
            ],
            'ie' => [
                'string',
                'nullable',
                'unique:business_partners',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'zip_code' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'number' => [
                'string',
                'required',
            ],
            'complement' => [
                'string',
                'nullable',
            ],
            'district' => [
                'string',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'state' => [
                'string',
                'required',
            ],
            'country' => [
                'string',
                'nullable',
            ],
        ];
    }
}

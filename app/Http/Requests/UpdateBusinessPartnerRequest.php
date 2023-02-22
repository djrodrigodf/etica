<?php

namespace App\Http\Requests;

use App\Models\BusinessPartner;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBusinessPartnerRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('business_partner_edit');
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
                'unique:business_partners,cnpj_cpf,' . request()->route('business_partner')->id,
            ],
            'ie' => [
                'string',
                'required',
                'unique:business_partners,ie,' . request()->route('business_partner')->id,
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

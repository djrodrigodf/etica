<?php

namespace App\Http\Requests;

use App\Models\Admission;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAdmissionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('admission_edit');
    }

    public function rules()
    {
        return [
            'company_id' => [
                'required',
                'integer',
            ],
            'construction_id' => [
                'required',
                'integer',
            ],
            'partner_id' => [
                'required',
                'integer',
            ],
            'occupation_id' => [
                'required',
                'integer',
            ],
            'salary_id' => [
                'required',
                'integer',
            ],
            'admission_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rg' => [
                'string',
                'required',
            ],
            'ctps' => [
                'string',
                'required',
            ],
            'serial' => [
                'string',
                'nullable',
            ],
            'uf' => [
                'string',
                'uf',
                'nullable',
            ],
            'gender' => [
                'required',
            ],
            'birth' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'naturalness' => [
                'string',
                'nullable',
            ],
            'phone_contact' => [
                'string',
                'nullable',
            ],
            'phone_message' => [
                'string',
                'nullable',
            ],
            'spouse' => [
                'string',
                'nullable',
            ],
            'spouse_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'spouse_cpf' => [
                'string',
                'nullable',
                'cpf'
            ],
            'spouse_rg' => [
                'string',
                'nullable',
            ],
            'children_qtd' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'other_courses' => [
                'string',
                'nullable',
            ],
            'relative_name' => [
                'string',
                'nullable',
            ],
            'relative_kinship' => [
                'string',
                'nullable',
            ],
            'tshirt' => [
                'string',
                'nullable',
            ],
            'pants' => [
                'string',
                'nullable',
            ],
            'boot' => [
                'string',
                'nullable',
            ],
            'bank' => [
                'string',
                'nullable',
            ],
            'bank_account' => [
                'string',
                'nullable',
            ],
            'bank_type' => [
                'string',
                'nullable',
            ],
            'bank_agency' => [
                'string',
                'nullable',
            ],
            'operation' => [
                'string',
                'nullable',
            ],
            'pix' => [
                'string',
                'nullable',
            ],
            'date_declaration' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}

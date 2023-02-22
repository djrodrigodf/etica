<?php

namespace App\Http\Requests;

use App\Models\Construction;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreConstructionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('construction_create');
    }

    public function rules()
    {
        return [
            'project_mega' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'work_group' => [
                'string',
                'nullable',
            ],
            'copartner' => [
                'string',
                'nullable',
            ],
            'teams.*' => [
                'integer',
            ],
            'teams' => [
                'array',
            ],
            'iss' => [
                'numeric',
            ],
            'tax' => [
                'numeric',
            ],
            'partner_percentage' => [
                'numeric',
            ],
            'role' => [
                'string',
                'nullable',
            ],
            'administration_fee' => [
                'numeric',
            ],
            'public_notice_number' => [
                'string',
                'nullable',
            ],
            'average_discount' => [
                'numeric',
            ],
            'budget_base_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'proposal_base_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'use_base_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'contract_number' => [
                'string',
                'nullable',
            ],
            'contract_publication_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'deadline_contract' => [
                'string',
                'nullable',
            ],
            'start_order_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'cei_registration' => [
                'string',
                'nullable',
            ],
            'cnpj_branch' => [
                'string',
                'nullable',
            ],
            'construction_site_city' => [
                'string',
                'nullable',
            ],
            'site_address' => [
                'string',
                'nullable',
            ],
        ];
    }
}

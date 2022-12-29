<?php

namespace App\Http\Requests;

use App\Models\ThirdPartyRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateThirdPartyRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('third_party_registration_edit');
    }

    public function rules()
    {
        return [
            'partner_id' => [
                'required',
                'integer',
            ],
            'construction_id' => [
                'required',
                'integer',
            ],
            'contract' => [
                'string',
                'nullable',
            ],
            'occupation_id' => [
                'required',
                'integer',
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}

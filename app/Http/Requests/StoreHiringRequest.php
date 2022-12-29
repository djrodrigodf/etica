<?php

namespace App\Http\Requests;

use App\Models\Hiring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHiringRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hiring_create');
    }

    public function rules()
    {
        return [
            'partner_id' => [
                'required',
                'integer',
            ],
            'date_birth' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'occupation_id' => [
                'required',
                'integer',
            ],
            'salary' => [
                'required',
            ],
            'beginning' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'finish' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'registration' => [
                'string',
                'nullable',
            ],
        ];
    }
}

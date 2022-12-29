<?php

namespace App\Http\Requests;

use App\Models\Occupation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateOccupationRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('occupation_edit');
    }

    public function rules()
    {
        return [
            'id_group' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'office' => [
                'string',
                'required',
                'unique:occupations,office,' . request()->route('occupation')->id,
            ],
        ];
    }
}

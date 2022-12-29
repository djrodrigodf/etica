<?php

namespace App\Http\Requests;

use App\Models\Exam;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreExamRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('exam_create');
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
            'exame' => [
                'string',
                'required',
            ],
        ];
    }
}

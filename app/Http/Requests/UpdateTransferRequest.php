<?php

namespace App\Http\Requests;

use App\Models\Transfer;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTransferRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('transfer_edit');
    }

    public function rules()
    {
        return [
            'obra_id' => [
                'required',
                'integer',
            ],
            'date_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_end' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}

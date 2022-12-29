<?php

namespace App\Http\Requests;

use App\Models\Hiring;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHiringRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hiring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hirings,id',
        ];
    }
}

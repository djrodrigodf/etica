<?php

namespace App\Http\Requests;

use App\Models\ThirdPartyRegistration;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyThirdPartyRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('third_party_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:third_party_registrations,id',
        ];
    }
}

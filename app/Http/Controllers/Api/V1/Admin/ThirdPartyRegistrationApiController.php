<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreThirdPartyRegistrationRequest;
use App\Http\Requests\UpdateThirdPartyRegistrationRequest;
use App\Http\Resources\Admin\ThirdPartyRegistrationResource;
use App\Models\ThirdPartyRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdPartyRegistrationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('third_party_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdPartyRegistrationResource(ThirdPartyRegistration::with(['partner', 'construction', 'occupation'])->get());
    }

    public function store(StoreThirdPartyRegistrationRequest $request)
    {
        $thirdPartyRegistration = ThirdPartyRegistration::create($request->all());

        return (new ThirdPartyRegistrationResource($thirdPartyRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ThirdPartyRegistration $thirdPartyRegistration)
    {
        abort_if(Gate::denies('third_party_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ThirdPartyRegistrationResource($thirdPartyRegistration->load(['partner', 'construction', 'occupation']));
    }

    public function update(UpdateThirdPartyRegistrationRequest $request, ThirdPartyRegistration $thirdPartyRegistration)
    {
        $thirdPartyRegistration->update($request->all());

        return (new ThirdPartyRegistrationResource($thirdPartyRegistration))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ThirdPartyRegistration $thirdPartyRegistration)
    {
        abort_if(Gate::denies('third_party_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdPartyRegistration->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

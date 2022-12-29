<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Http\Resources\Admin\AdmissionResource;
use App\Models\Admission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionResource(Admission::with(['company', 'construction', 'partner', 'occupation', 'salary'])->get());
    }

    public function store(StoreAdmissionRequest $request)
    {
        $admission = Admission::create($request->all());

        return (new AdmissionResource($admission))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Admission $admission)
    {
        abort_if(Gate::denies('admission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AdmissionResource($admission->load(['company', 'construction', 'partner', 'occupation', 'salary']));
    }

    public function update(UpdateAdmissionRequest $request, Admission $admission)
    {
        $admission->update($request->all());

        return (new AdmissionResource($admission))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Admission $admission)
    {
        abort_if(Gate::denies('admission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admission->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

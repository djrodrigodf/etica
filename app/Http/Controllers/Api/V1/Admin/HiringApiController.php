<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHiringRequest;
use App\Http\Requests\UpdateHiringRequest;
use App\Http\Resources\Admin\HiringResource;
use App\Models\Hiring;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HiringApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('hiring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HiringResource(Hiring::with(['construction', 'partner', 'occupation', 'company'])->get());
    }

    public function store(StoreHiringRequest $request)
    {
        $hiring = Hiring::create($request->all());

        return (new HiringResource($hiring))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Hiring $hiring)
    {
        abort_if(Gate::denies('hiring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new HiringResource($hiring->load(['construction', 'partner', 'occupation', 'company']));
    }

    public function update(UpdateHiringRequest $request, Hiring $hiring)
    {
        $hiring->update($request->all());

        return (new HiringResource($hiring))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Hiring $hiring)
    {
        abort_if(Gate::denies('hiring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiring->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

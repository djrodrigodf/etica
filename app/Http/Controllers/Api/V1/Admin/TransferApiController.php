<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Http\Resources\Admin\TransferResource;
use App\Models\Transfer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransferResource(Transfer::with(['obra', 'business_partner'])->get());
    }

    public function store(StoreTransferRequest $request)
    {
        $transfer = Transfer::create($request->all());

        return (new TransferResource($transfer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TransferResource($transfer->load(['obra', 'business_partner']));
    }

    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        $transfer->update($request->all());

        return (new TransferResource($transfer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

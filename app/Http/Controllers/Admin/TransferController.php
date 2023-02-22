<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransferRequest;
use App\Http\Requests\StoreTransferRequest;
use App\Http\Requests\UpdateTransferRequest;
use App\Models\BusinessPartner;
use App\Models\Construction;
use App\Models\Transfer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransferController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('transfer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfers = Transfer::with(['obra', 'business_partner'])->get();

        $constructions = Construction::get();

        $business_partners = BusinessPartner::get();

        return view('admin.transfers.index', compact('business_partners', 'constructions', 'transfers'));
    }

    public function create()
    {
        abort_if(Gate::denies('transfer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obras = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $business_partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.transfers.create', compact('business_partners', 'obras'));
    }

    public function store(StoreTransferRequest $request)
    {
        $transfer = Transfer::create($request->all());

        return redirect()->route('admin.transfers.index');
    }

    public function edit(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obras = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $business_partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transfer->load('obra', 'business_partner');

        return view('admin.transfers.edit', compact('business_partners', 'obras', 'transfer'));
    }

    public function update(UpdateTransferRequest $request, Transfer $transfer)
    {
        $transfer->update($request->all());

        return redirect()->route('admin.transfers.index');
    }

    public function show(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->load('obra', 'business_partner');

        return view('admin.transfers.show', compact('transfer'));
    }

    public function destroy(Transfer $transfer)
    {
        abort_if(Gate::denies('transfer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transfer->delete();

        return back();
    }

    public function massDestroy(MassDestroyTransferRequest $request)
    {
        $transfers = Transfer::find(request('ids'));

        foreach ($transfers as $transfer) {
            $transfer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

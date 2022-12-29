<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBusinessPartnerRequest;
use App\Http\Requests\StoreBusinessPartnerRequest;
use App\Http\Requests\UpdateBusinessPartnerRequest;
use App\Models\BusinessPartner;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BusinessPartnerController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('business_partner_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartners = BusinessPartner::all();

        return view('admin.businessPartners.index', compact('businessPartners'));
    }

    public function create()
    {
        abort_if(Gate::denies('business_partner_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.businessPartners.create');
    }

    public function store(StoreBusinessPartnerRequest $request)
    {
        $businessPartner = BusinessPartner::create($request->all());

        return redirect()->route('admin.business-partners.index');
    }

    public function edit(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.businessPartners.edit', compact('businessPartner'));
    }

    public function update(UpdateBusinessPartnerRequest $request, BusinessPartner $businessPartner)
    {
        $businessPartner->update($request->all());

        return redirect()->route('admin.business-partners.index');
    }

    public function show(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartner->load('partnerAdmissions', 'partnerHirings', 'partnerThirdPartyRegistrations', 'teamConstructions');

        return view('admin.businessPartners.show', compact('businessPartner'));
    }

    public function destroy(BusinessPartner $businessPartner)
    {
        abort_if(Gate::denies('business_partner_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $businessPartner->delete();

        return back();
    }

    public function massDestroy(MassDestroyBusinessPartnerRequest $request)
    {
        BusinessPartner::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

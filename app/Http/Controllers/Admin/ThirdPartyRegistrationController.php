<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyThirdPartyRegistrationRequest;
use App\Http\Requests\StoreThirdPartyRegistrationRequest;
use App\Http\Requests\UpdateThirdPartyRegistrationRequest;
use App\Models\BusinessPartner;
use App\Models\Construction;
use App\Models\Occupation;
use App\Models\ThirdPartyRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ThirdPartyRegistrationController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('third_party_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdPartyRegistrations = ThirdPartyRegistration::with(['partner', 'construction', 'occupation'])->get();

        $business_partners = BusinessPartner::get();

        $constructions = Construction::get();

        $occupations = Occupation::get();

        return view('admin.thirdPartyRegistrations.index', compact('business_partners', 'constructions', 'occupations', 'thirdPartyRegistrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('third_party_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.thirdPartyRegistrations.create', compact('constructions', 'occupations', 'partners'));
    }

    public function store(StoreThirdPartyRegistrationRequest $request)
    {
        $thirdPartyRegistration = ThirdPartyRegistration::create($request->all());

        return redirect()->route('admin.third-party-registrations.index');
    }

    public function edit(ThirdPartyRegistration $thirdPartyRegistration)
    {
        abort_if(Gate::denies('third_party_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        $thirdPartyRegistration->load('partner', 'construction', 'occupation');

        return view('admin.thirdPartyRegistrations.edit', compact('constructions', 'occupations', 'partners', 'thirdPartyRegistration'));
    }

    public function update(UpdateThirdPartyRegistrationRequest $request, ThirdPartyRegistration $thirdPartyRegistration)
    {
        $thirdPartyRegistration->update($request->all());

        return redirect()->route('admin.third-party-registrations.index');
    }

    public function show(ThirdPartyRegistration $thirdPartyRegistration)
    {
        abort_if(Gate::denies('third_party_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdPartyRegistration->load('partner', 'construction', 'occupation');

        return view('admin.thirdPartyRegistrations.show', compact('thirdPartyRegistration'));
    }

    public function destroy(ThirdPartyRegistration $thirdPartyRegistration)
    {
        abort_if(Gate::denies('third_party_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $thirdPartyRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyThirdPartyRegistrationRequest $request)
    {
        ThirdPartyRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

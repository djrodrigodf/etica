<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyHiringRequest;
use App\Http\Requests\StoreHiringRequest;
use App\Http\Requests\UpdateHiringRequest;
use App\Models\BusinessPartner;
use App\Models\Company;
use App\Models\Construction;
use App\Models\Hiring;
use App\Models\Occupation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HiringController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('hiring_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hirings = Hiring::with(['construction', 'partner', 'occupation', 'company'])->get();

        $constructions = Construction::get();

        $business_partners = BusinessPartner::get();

        $occupations = Occupation::get();

        $companies = Company::get();

        return view('admin.hirings.index', compact('business_partners', 'companies', 'constructions', 'hirings', 'occupations'));
    }

    public function create()
    {
        abort_if(Gate::denies('hiring_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.hirings.create', compact('companies', 'constructions', 'occupations', 'partners'));
    }

    public function store(StoreHiringRequest $request)
    {
        $hiring = Hiring::create($request->all());

        return redirect()->route('admin.hirings.index');
    }

    public function edit(Hiring $hiring)
    {
        abort_if(Gate::denies('hiring_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $hiring->load('construction', 'partner', 'occupation', 'company');

        return view('admin.hirings.edit', compact('companies', 'constructions', 'hiring', 'occupations', 'partners'));
    }

    public function update(UpdateHiringRequest $request, Hiring $hiring)
    {
        $hiring->update($request->all());

        return redirect()->route('admin.hirings.index');
    }

    public function show(Hiring $hiring)
    {
        abort_if(Gate::denies('hiring_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiring->load('construction', 'partner', 'occupation', 'company');

        return view('admin.hirings.show', compact('hiring'));
    }

    public function destroy(Hiring $hiring)
    {
        abort_if(Gate::denies('hiring_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hiring->delete();

        return back();
    }

    public function massDestroy(MassDestroyHiringRequest $request)
    {
        Hiring::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

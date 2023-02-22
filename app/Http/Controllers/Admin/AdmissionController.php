<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAdmissionRequest;
use App\Http\Requests\StoreAdmissionRequest;
use App\Http\Requests\UpdateAdmissionRequest;
use App\Models\Admission;
use App\Models\BusinessPartner;
use App\Models\Company;
use App\Models\Construction;
use App\Models\Occupation;
use App\Models\Salary;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdmissionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('admission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admissions = Admission::with(['company', 'construction', 'partner', 'occupation', 'salary'])->get();

        $companies = Company::get();

        $constructions = Construction::get();

        $business_partners = BusinessPartner::get();

        $occupations = Occupation::get();

        $salaries = Salary::get();

        return view('admin.admissions.index', compact('admissions', 'business_partners', 'companies', 'constructions', 'occupations', 'salaries'));
    }

    public function create()
    {
        abort_if(Gate::denies('admission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.admissions.create', compact('companies', 'constructions', 'occupations', 'partners', 'salaries'));
    }

    public function store(StoreAdmissionRequest $request)
    {
        $admission = Admission::create($request->all());

        return redirect()->route('admin.admissions.index');
    }

    public function edit(Admission $admission)
    {
        abort_if(Gate::denies('admission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companies = Company::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $constructions = Construction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partners = BusinessPartner::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $occupations = Occupation::pluck('office', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salaries = Salary::pluck('value', 'id')->prepend(trans('global.pleaseSelect'), '');

        $admission->load('company', 'construction', 'partner', 'occupation', 'salary');

        return view('admin.admissions.edit', compact('admission', 'companies', 'constructions', 'occupations', 'partners', 'salaries'));
    }

    public function update(UpdateAdmissionRequest $request, Admission $admission)
    {
        $admission->update($request->all());

        return redirect()->route('admin.admissions.index');
    }

    public function show(Admission $admission)
    {
        abort_if(Gate::denies('admission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admission->load('company', 'construction', 'partner', 'occupation', 'salary');

        return view('admin.admissions.show', compact('admission'));
    }

    public function destroy(Admission $admission)
    {
        abort_if(Gate::denies('admission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $admission->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdmissionRequest $request)
    {
        Admission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}

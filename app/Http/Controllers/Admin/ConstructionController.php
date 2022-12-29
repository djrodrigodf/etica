<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyConstructionRequest;
use App\Http\Requests\StoreConstructionRequest;
use App\Http\Requests\UpdateConstructionRequest;
use App\Models\BusinessPartner;
use App\Models\Construction;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConstructionController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('construction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $constructions = Construction::with(['teams'])->get();

        $business_partners = BusinessPartner::get();

        return view('admin.constructions.index', compact('business_partners', 'constructions'));
    }

    public function create()
    {
        abort_if(Gate::denies('construction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = BusinessPartner::pluck('name', 'id');

        return view('admin.constructions.create', compact('teams'));
    }

    public function store(StoreConstructionRequest $request)
    {
        $construction = Construction::create($request->all());
        $construction->teams()->sync($request->input('teams', []));

        return redirect()->route('admin.constructions.index');
    }

    public function edit(Construction $construction)
    {
        abort_if(Gate::denies('construction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teams = BusinessPartner::pluck('name', 'id');

        $construction->load('teams');

        return view('admin.constructions.edit', compact('construction', 'teams'));
    }

    public function update(UpdateConstructionRequest $request, Construction $construction)
    {
        $construction->update($request->all());
        $construction->teams()->sync($request->input('teams', []));

        return redirect()->route('admin.constructions.index');
    }

    public function show(Construction $construction)
    {
        abort_if(Gate::denies('construction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $construction->load('teams', 'constructionHirings', 'constructionThirdPartyRegistrations');

        return view('admin.constructions.show', compact('construction'));
    }

    public function destroy(Construction $construction)
    {
        abort_if(Gate::denies('construction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $construction->delete();

        return back();
    }

    public function massDestroy(MassDestroyConstructionRequest $request)
    {
        Construction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
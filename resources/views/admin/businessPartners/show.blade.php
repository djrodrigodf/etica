@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.businessPartner.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.id') }}
                        </th>
                        <td>
                            {{ $businessPartner->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.name') }}
                        </th>
                        <td>
                            {{ $businessPartner->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.company_name') }}
                        </th>
                        <td>
                            {{ $businessPartner->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.cnpj_cpf') }}
                        </th>
                        <td>
                            {{ $businessPartner->cnpj_cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.ie') }}
                        </th>
                        <td>
                            {{ $businessPartner->ie }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.phone') }}
                        </th>
                        <td>
                            {{ $businessPartner->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.email') }}
                        </th>
                        <td>
                            {{ $businessPartner->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.zip_code') }}
                        </th>
                        <td>
                            {{ $businessPartner->zip_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.address') }}
                        </th>
                        <td>
                            {{ $businessPartner->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.number') }}
                        </th>
                        <td>
                            {{ $businessPartner->number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.complement') }}
                        </th>
                        <td>
                            {{ $businessPartner->complement }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.district') }}
                        </th>
                        <td>
                            {{ $businessPartner->district }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.city') }}
                        </th>
                        <td>
                            {{ $businessPartner->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.state') }}
                        </th>
                        <td>
                            {{ $businessPartner->state }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.businessPartner.fields.country') }}
                        </th>
                        <td>
                            {{ $businessPartner->country }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.business-partners.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#partner_admissions" role="tab" data-toggle="tab">
                {{ trans('cruds.admission.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#partner_hirings" role="tab" data-toggle="tab">
                {{ trans('cruds.hiring.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#partner_third_party_registrations" role="tab" data-toggle="tab">
                {{ trans('cruds.thirdPartyRegistration.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#team_constructions" role="tab" data-toggle="tab">
                {{ trans('cruds.construction.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#file_manager" role="tab" data-toggle="tab">
                Arquivos
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="partner_admissions">
            @includeIf('admin.businessPartners.relationships.partnerAdmissions', ['admissions' => $businessPartner->partnerAdmissions])
        </div>
        <div class="tab-pane" role="tabpanel" id="partner_hirings">
            @includeIf('admin.businessPartners.relationships.partnerHirings', ['hirings' => $businessPartner->partnerHirings])
        </div>
        <div class="tab-pane" role="tabpanel" id="partner_third_party_registrations">
            @includeIf('admin.businessPartners.relationships.partnerThirdPartyRegistrations', ['thirdPartyRegistrations' => $businessPartner->partnerThirdPartyRegistrations])
        </div>
        <div class="tab-pane" role="tabpanel" id="team_constructions">
            @includeIf('admin.businessPartners.relationships.teamConstructions', ['constructions' => $businessPartner->teamConstructions])
        </div>
        <div class="tab-pane" role="tabpanel" id="file_manager">
            @includeIf('components.filemanager')
        </div>
    </div>
</div>

@endsection

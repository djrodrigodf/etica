@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.construction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.constructions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.id') }}
                        </th>
                        <td>
                            {{ $construction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.project_mega') }}
                        </th>
                        <td>
                            {{ $construction->project_mega }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.name') }}
                        </th>
                        <td>
                            {{ $construction->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.public_agency') }}
                        </th>
                        <td>
                            {{ App\Models\Construction::PUBLIC_AGENCY_SELECT[$construction->public_agency] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.situation') }}
                        </th>
                        <td>
                            {{ App\Models\Construction::SITUATION_SELECT[$construction->situation] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.work_group') }}
                        </th>
                        <td>
                            {{ $construction->work_group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.copartner') }}
                        </th>
                        <td>
                            {{ $construction->copartner }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.team') }}
                        </th>
                        <td>
                            @foreach($construction->teams as $key => $team)
                                <span class="label label-info">{{ $team->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.iss') }}
                        </th>
                        <td>
                            {{ $construction->iss }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.tax') }}
                        </th>
                        <td>
                            {{ $construction->tax }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.partner_percentage') }}
                        </th>
                        <td>
                            {{ $construction->partner_percentage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.role') }}
                        </th>
                        <td>
                            {{ $construction->role }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.administration_fee') }}
                        </th>
                        <td>
                            {{ $construction->administration_fee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.reserve_fund') }}
                        </th>
                        <td>
                            {{ $construction->reserve_fund }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.public_notice_number') }}
                        </th>
                        <td>
                            {{ $construction->public_notice_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.average_discount') }}
                        </th>
                        <td>
                            {{ $construction->average_discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.budget_base_date') }}
                        </th>
                        <td>
                            {{ $construction->budget_base_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.proposal_base_date') }}
                        </th>
                        <td>
                            {{ $construction->proposal_base_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.use_base_date') }}
                        </th>
                        <td>
                            {{ $construction->use_base_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.contract_value') }}
                        </th>
                        <td>
                            {{ $construction->contract_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Construction::TYPE_SELECT[$construction->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.contract_number') }}
                        </th>
                        <td>
                            {{ $construction->contract_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.contract_publication_date') }}
                        </th>
                        <td>
                            {{ $construction->contract_publication_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.deadline_contract') }}
                        </th>
                        <td>
                            {{ $construction->deadline_contract }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.start_order_date') }}
                        </th>
                        <td>
                            {{ $construction->start_order_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.cei_registration') }}
                        </th>
                        <td>
                            {{ $construction->cei_registration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.cnpj_branch') }}
                        </th>
                        <td>
                            {{ $construction->cnpj_branch }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.policy_value') }}
                        </th>
                        <td>
                            {{ $construction->policy_value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.construction_site_city') }}
                        </th>
                        <td>
                            {{ $construction->construction_site_city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.construction.fields.site_address') }}
                        </th>
                        <td>
                            {{ $construction->site_address }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.constructions.index') }}">
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
            <a class="nav-link" href="#construction_hirings" role="tab" data-toggle="tab">
                {{ trans('cruds.hiring.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#construction_third_party_registrations" role="tab" data-toggle="tab">
                {{ trans('cruds.thirdPartyRegistration.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="construction_hirings">
            @includeIf('admin.constructions.relationships.constructionHirings', ['hirings' => $construction->constructionHirings])
        </div>
        <div class="tab-pane" role="tabpanel" id="construction_third_party_registrations">
            @includeIf('admin.constructions.relationships.constructionThirdPartyRegistrations', ['thirdPartyRegistrations' => $construction->constructionThirdPartyRegistrations])
        </div>
    </div>
</div>

@endsection
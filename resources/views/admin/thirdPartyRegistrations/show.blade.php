@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.thirdPartyRegistration.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.third-party-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.id') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.partner') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->partner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.construction') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->construction->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.contract') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->contract }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.occupation') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->occupation->office ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.date_start') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->date_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.date_end') }}
                        </th>
                        <td>
                            {{ $thirdPartyRegistration->date_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.accommodation') }}
                        </th>
                        <td>
                            {{ App\Models\ThirdPartyRegistration::ACCOMMODATION_SELECT[$thirdPartyRegistration->accommodation] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.food') }}
                        </th>
                        <td>
                            {{ App\Models\ThirdPartyRegistration::FOOD_SELECT[$thirdPartyRegistration->food] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.epi') }}
                        </th>
                        <td>
                            {{ App\Models\ThirdPartyRegistration::EPI_SELECT[$thirdPartyRegistration->epi] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.transport') }}
                        </th>
                        <td>
                            {{ App\Models\ThirdPartyRegistration::TRANSPORT_SELECT[$thirdPartyRegistration->transport] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.third-party-registrations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
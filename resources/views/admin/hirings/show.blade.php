@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hiring.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hirings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.id') }}
                        </th>
                        <td>
                            {{ $hiring->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.construction') }}
                        </th>
                        <td>
                            {{ $hiring->construction->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.partner') }}
                        </th>
                        <td>
                            {{ $hiring->partner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.date_birth') }}
                        </th>
                        <td>
                            {{ $hiring->date_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.occupation') }}
                        </th>
                        <td>
                            {{ $hiring->occupation->office ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.salary') }}
                        </th>
                        <td>
                            {{ $hiring->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.company') }}
                        </th>
                        <td>
                            {{ $hiring->company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.capacity') }}
                        </th>
                        <td>
                            {{ App\Models\Hiring::CAPACITY_SELECT[$hiring->capacity] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.beginning') }}
                        </th>
                        <td>
                            {{ $hiring->beginning }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.finish') }}
                        </th>
                        <td>
                            {{ $hiring->finish }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.clt') }}
                        </th>
                        <td>
                            {{ App\Models\Hiring::CLT_RADIO[$hiring->clt] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.registration') }}
                        </th>
                        <td>
                            {{ $hiring->registration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.health_plan') }}
                        </th>
                        <td>
                            {{ $hiring->health_plan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.vehicle_rental') }}
                        </th>
                        <td>
                            {{ $hiring->vehicle_rental }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.laptop_rental') }}
                        </th>
                        <td>
                            {{ $hiring->laptop_rental }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hiring.fields.phone_plan') }}
                        </th>
                        <td>
                            {{ $hiring->phone_plan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hirings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
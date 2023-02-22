@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transfer.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.id') }}
                        </th>
                        <td>
                            {{ $transfer->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.obra') }}
                        </th>
                        <td>
                            {{ $transfer->obra->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.business_partner') }}
                        </th>
                        <td>
                            {{ $transfer->business_partner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.date_start') }}
                        </th>
                        <td>
                            {{ $transfer->date_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transfer.fields.date_end') }}
                        </th>
                        <td>
                            {{ $transfer->date_end }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transfers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
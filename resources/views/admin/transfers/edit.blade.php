@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transfer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transfers.update", [$transfer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="obra_id">{{ trans('cruds.transfer.fields.obra') }}</label>
                <select class="form-control select2 {{ $errors->has('obra') ? 'is-invalid' : '' }}" name="obra_id" id="obra_id" required>
                    @foreach($obras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('obra_id') ? old('obra_id') : $transfer->obra->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('obra'))
                    <div class="invalid-feedback">
                        {{ $errors->first('obra') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transfer.fields.obra_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="business_partner_id">{{ trans('cruds.transfer.fields.business_partner') }}</label>
                <select class="form-control select2 {{ $errors->has('business_partner') ? 'is-invalid' : '' }}" name="business_partner_id" id="business_partner_id">
                    @foreach($business_partners as $id => $entry)
                        <option value="{{ $id }}" {{ (old('business_partner_id') ? old('business_partner_id') : $transfer->business_partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('business_partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('business_partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transfer.fields.business_partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_start">{{ trans('cruds.transfer.fields.date_start') }}</label>
                <input class="form-control date {{ $errors->has('date_start') ? 'is-invalid' : '' }}" type="text" name="date_start" id="date_start" value="{{ old('date_start', $transfer->date_start) }}" required>
                @if($errors->has('date_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transfer.fields.date_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_end">{{ trans('cruds.transfer.fields.date_end') }}</label>
                <input class="form-control date {{ $errors->has('date_end') ? 'is-invalid' : '' }}" type="text" name="date_end" id="date_end" value="{{ old('date_end', $transfer->date_end) }}">
                @if($errors->has('date_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transfer.fields.date_end_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.thirdPartyRegistration.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.third-party-registrations.update", [$thirdPartyRegistration->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="partner_id">{{ trans('cruds.thirdPartyRegistration.fields.partner') }}</label>
                        <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>
                            @foreach($partners as $id => $entry)
                                <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : $thirdPartyRegistration->partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('partner'))
                            <div class="invalid-feedback">
                                {{ $errors->first('partner') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.partner_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="construction_id">{{ trans('cruds.thirdPartyRegistration.fields.construction') }}</label>
                        <select class="form-control select2 {{ $errors->has('construction') ? 'is-invalid' : '' }}" name="construction_id" id="construction_id" required>
                            @foreach($constructions as $id => $entry)
                                <option value="{{ $id }}" {{ (old('construction_id') ? old('construction_id') : $thirdPartyRegistration->construction->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('construction'))
                            <div class="invalid-feedback">
                                {{ $errors->first('construction') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.construction_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="contract">{{ trans('cruds.thirdPartyRegistration.fields.contract') }}</label>
                        <input class="form-control {{ $errors->has('contract') ? 'is-invalid' : '' }}" type="text" name="contract" id="contract" value="{{ old('contract', $thirdPartyRegistration->contract) }}">
                        @if($errors->has('contract'))
                            <div class="invalid-feedback">
                                {{ $errors->first('contract') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.contract_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="occupation_id">{{ trans('cruds.thirdPartyRegistration.fields.occupation') }}</label>
                        <select class="form-control select2 {{ $errors->has('occupation') ? 'is-invalid' : '' }}" name="occupation_id" id="occupation_id" required>
                            @foreach($occupations as $id => $entry)
                                <option value="{{ $id }}" {{ (old('occupation_id') ? old('occupation_id') : $thirdPartyRegistration->occupation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('occupation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('occupation') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.occupation_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="date_start">{{ trans('cruds.thirdPartyRegistration.fields.date_start') }}</label>
                        <input class="form-control date {{ $errors->has('date_start') ? 'is-invalid' : '' }}" type="text" name="date_start" id="date_start" value="{{ old('date_start', $thirdPartyRegistration->date_start) }}" required>
                        @if($errors->has('date_start'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date_start') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.date_start_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="required" for="date_end">{{ trans('cruds.thirdPartyRegistration.fields.date_end') }}</label>
                        <input class="form-control date {{ $errors->has('date_end') ? 'is-invalid' : '' }}" type="text" name="date_end" id="date_end" value="{{ old('date_end', $thirdPartyRegistration->date_end) }}" required>
                        @if($errors->has('date_end'))
                            <div class="invalid-feedback">
                                {{ $errors->first('date_end') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.date_end_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.thirdPartyRegistration.fields.accommodation') }}</label>
                        <select class="form-control {{ $errors->has('accommodation') ? 'is-invalid' : '' }}" name="accommodation" id="accommodation">
                            <option value disabled {{ old('accommodation', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\ThirdPartyRegistration::ACCOMMODATION_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('accommodation', $thirdPartyRegistration->accommodation) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('accommodation'))
                            <div class="invalid-feedback">
                                {{ $errors->first('accommodation') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.accommodation_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.thirdPartyRegistration.fields.food') }}</label>
                        <select class="form-control {{ $errors->has('food') ? 'is-invalid' : '' }}" name="food" id="food">
                            <option value disabled {{ old('food', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\ThirdPartyRegistration::FOOD_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('food', $thirdPartyRegistration->food) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('food'))
                            <div class="invalid-feedback">
                                {{ $errors->first('food') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.food_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.thirdPartyRegistration.fields.epi') }}</label>
                        <select class="form-control {{ $errors->has('epi') ? 'is-invalid' : '' }}" name="epi" id="epi">
                            <option value disabled {{ old('epi', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\ThirdPartyRegistration::EPI_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('epi', $thirdPartyRegistration->epi) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('epi'))
                            <div class="invalid-feedback">
                                {{ $errors->first('epi') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.epi_helper') }}</span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ trans('cruds.thirdPartyRegistration.fields.transport') }}</label>
                        <select class="form-control {{ $errors->has('transport') ? 'is-invalid' : '' }}" name="transport" id="transport">
                            <option value disabled {{ old('transport', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                            @foreach(App\Models\ThirdPartyRegistration::TRANSPORT_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('transport', $thirdPartyRegistration->transport) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('transport'))
                            <div class="invalid-feedback">
                                {{ $errors->first('transport') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.thirdPartyRegistration.fields.transport_helper') }}</span>
                    </div>
                </div>
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

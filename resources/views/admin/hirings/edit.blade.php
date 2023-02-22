@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.hiring.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.hirings.update", [$hiring->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="construction_id">{{ trans('cruds.hiring.fields.construction') }}</label>
                <select class="form-control select2 {{ $errors->has('construction') ? 'is-invalid' : '' }}" name="construction_id" id="construction_id">
                    @foreach($constructions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('construction_id') ? old('construction_id') : $hiring->construction->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('construction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('construction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.construction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="partner_id">{{ trans('cruds.hiring.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ (old('partner_id') ? old('partner_id') : $hiring->partner->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_birth">{{ trans('cruds.hiring.fields.date_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_birth') ? 'is-invalid' : '' }}" type="text" name="date_birth" id="date_birth" value="{{ old('date_birth', $hiring->date_birth) }}">
                @if($errors->has('date_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.date_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_id">{{ trans('cruds.hiring.fields.occupation') }}</label>
                <select class="form-control select2 {{ $errors->has('occupation') ? 'is-invalid' : '' }}" name="occupation_id" id="occupation_id" required>
                    @foreach($occupations as $id => $entry)
                        <option value="{{ $id }}" {{ (old('occupation_id') ? old('occupation_id') : $hiring->occupation->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('occupation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary">{{ trans('cruds.hiring.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', $hiring->salary) }}" step="0.01" required>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="company_id">{{ trans('cruds.hiring.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id">
                    @foreach($companies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : $hiring->company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.hiring.fields.capacity') }}</label>
                <select class="form-control {{ $errors->has('capacity') ? 'is-invalid' : '' }}" name="capacity" id="capacity">
                    <option value disabled {{ old('capacity', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Hiring::CAPACITY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('capacity', $hiring->capacity) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('capacity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('capacity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.capacity_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="beginning">{{ trans('cruds.hiring.fields.beginning') }}</label>
                <input class="form-control date {{ $errors->has('beginning') ? 'is-invalid' : '' }}" type="text" name="beginning" id="beginning" value="{{ old('beginning', $hiring->beginning) }}">
                @if($errors->has('beginning'))
                    <div class="invalid-feedback">
                        {{ $errors->first('beginning') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.beginning_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="finish">{{ trans('cruds.hiring.fields.finish') }}</label>
                <input class="form-control date {{ $errors->has('finish') ? 'is-invalid' : '' }}" type="text" name="finish" id="finish" value="{{ old('finish', $hiring->finish) }}">
                @if($errors->has('finish'))
                    <div class="invalid-feedback">
                        {{ $errors->first('finish') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.finish_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.hiring.fields.clt') }}</label>
                @foreach(App\Models\Hiring::CLT_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('clt') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="clt_{{ $key }}" name="clt" value="{{ $key }}" {{ old('clt', $hiring->clt) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="clt_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('clt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.clt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registration">{{ trans('cruds.hiring.fields.registration') }}</label>
                <input class="form-control {{ $errors->has('registration') ? 'is-invalid' : '' }}" type="text" name="registration" id="registration" value="{{ old('registration', $hiring->registration) }}">
                @if($errors->has('registration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.registration_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="health_plan">{{ trans('cruds.hiring.fields.health_plan') }}</label>
                <input class="form-control {{ $errors->has('health_plan') ? 'is-invalid' : '' }}" type="number" name="health_plan" id="health_plan" value="{{ old('health_plan', $hiring->health_plan) }}" step="0.01">
                @if($errors->has('health_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('health_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.health_plan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="vehicle_rental">{{ trans('cruds.hiring.fields.vehicle_rental') }}</label>
                <input class="form-control {{ $errors->has('vehicle_rental') ? 'is-invalid' : '' }}" type="number" name="vehicle_rental" id="vehicle_rental" value="{{ old('vehicle_rental', $hiring->vehicle_rental) }}" step="0.01">
                @if($errors->has('vehicle_rental'))
                    <div class="invalid-feedback">
                        {{ $errors->first('vehicle_rental') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.vehicle_rental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="laptop_rental">{{ trans('cruds.hiring.fields.laptop_rental') }}</label>
                <input class="form-control {{ $errors->has('laptop_rental') ? 'is-invalid' : '' }}" type="number" name="laptop_rental" id="laptop_rental" value="{{ old('laptop_rental', $hiring->laptop_rental) }}" step="0.01">
                @if($errors->has('laptop_rental'))
                    <div class="invalid-feedback">
                        {{ $errors->first('laptop_rental') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.laptop_rental_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_plan">{{ trans('cruds.hiring.fields.phone_plan') }}</label>
                <input class="form-control {{ $errors->has('phone_plan') ? 'is-invalid' : '' }}" type="number" name="phone_plan" id="phone_plan" value="{{ old('phone_plan', $hiring->phone_plan) }}" step="0.01">
                @if($errors->has('phone_plan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_plan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.hiring.fields.phone_plan_helper') }}</span>
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
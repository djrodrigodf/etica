@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.admission.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.admissions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.admission.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                    @foreach($companies as $id => $entry)
                        <option value="{{ $id }}" {{ old('company_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="construction_id">{{ trans('cruds.admission.fields.construction') }}</label>
                <select class="form-control select2 {{ $errors->has('construction') ? 'is-invalid' : '' }}" name="construction_id" id="construction_id" required>
                    @foreach($constructions as $id => $entry)
                        <option value="{{ $id }}" {{ old('construction_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('construction'))
                    <div class="invalid-feedback">
                        {{ $errors->first('construction') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.construction_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="partner_id">{{ trans('cruds.admission.fields.partner') }}</label>
                <select class="form-control select2 {{ $errors->has('partner') ? 'is-invalid' : '' }}" name="partner_id" id="partner_id" required>
                    @foreach($partners as $id => $entry)
                        <option value="{{ $id }}" {{ old('partner_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('partner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('partner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.partner_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="occupation_id">{{ trans('cruds.admission.fields.occupation') }}</label>
                <select class="form-control select2 {{ $errors->has('occupation') ? 'is-invalid' : '' }}" name="occupation_id" id="occupation_id" required>
                    @foreach($occupations as $id => $entry)
                        <option value="{{ $id }}" {{ old('occupation_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('occupation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('occupation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.occupation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_id">{{ trans('cruds.admission.fields.salary') }}</label>
                <select class="form-control select2 {{ $errors->has('salary') ? 'is-invalid' : '' }}" name="salary_id" id="salary_id" required>
                    @foreach($salaries as $id => $entry)
                        <option value="{{ $id }}" {{ old('salary_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="admission_date">{{ trans('cruds.admission.fields.admission_date') }}</label>
                <input class="form-control date {{ $errors->has('admission_date') ? 'is-invalid' : '' }}" type="text" name="admission_date" id="admission_date" value="{{ old('admission_date') }}" required>
                @if($errors->has('admission_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('admission_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.admission_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rg">{{ trans('cruds.admission.fields.rg') }}</label>
                <input class="form-control {{ $errors->has('rg') ? 'is-invalid' : '' }}" type="text" name="rg" id="rg" value="{{ old('rg', '') }}" required>
                @if($errors->has('rg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('rg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ctps">{{ trans('cruds.admission.fields.ctps') }}</label>
                <input class="form-control {{ $errors->has('ctps') ? 'is-invalid' : '' }}" type="text" name="ctps" id="ctps" value="{{ old('ctps', '') }}" required>
                @if($errors->has('ctps'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ctps') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.ctps_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="serial">{{ trans('cruds.admission.fields.serial') }}</label>
                <input class="form-control {{ $errors->has('serial') ? 'is-invalid' : '' }}" type="text" name="serial" id="serial" value="{{ old('serial', '') }}">
                @if($errors->has('serial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('serial') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.serial_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="uf">{{ trans('cruds.admission.fields.uf') }}</label>
                <input class="form-control {{ $errors->has('uf') ? 'is-invalid' : '' }}" type="text" name="uf" id="uf" value="{{ old('uf', '') }}">
                @if($errors->has('uf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('uf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.uf_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.admission.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="birth">{{ trans('cruds.admission.fields.birth') }}</label>
                <input class="form-control date {{ $errors->has('birth') ? 'is-invalid' : '' }}" type="text" name="birth" id="birth" value="{{ old('birth') }}" required>
                @if($errors->has('birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="naturalness">{{ trans('cruds.admission.fields.naturalness') }}</label>
                <input class="form-control {{ $errors->has('naturalness') ? 'is-invalid' : '' }}" type="text" name="naturalness" id="naturalness" value="{{ old('naturalness', '') }}">
                @if($errors->has('naturalness'))
                    <div class="invalid-feedback">
                        {{ $errors->first('naturalness') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.naturalness_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_contact">{{ trans('cruds.admission.fields.phone_contact') }}</label>
                <input class="form-control {{ $errors->has('phone_contact') ? 'is-invalid' : '' }}" type="text" name="phone_contact" id="phone_contact" value="{{ old('phone_contact', '') }}">
                @if($errors->has('phone_contact'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_contact') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.phone_contact_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_message">{{ trans('cruds.admission.fields.phone_message') }}</label>
                <input class="form-control {{ $errors->has('phone_message') ? 'is-invalid' : '' }}" type="text" name="phone_message" id="phone_message" value="{{ old('phone_message', '') }}">
                @if($errors->has('phone_message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.phone_message_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.marital_status') }}</label>
                <select class="form-control {{ $errors->has('marital_status') ? 'is-invalid' : '' }}" name="marital_status" id="marital_status">
                    <option value disabled {{ old('marital_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::MARITAL_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('marital_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('marital_status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('marital_status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.marital_status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse">{{ trans('cruds.admission.fields.spouse') }}</label>
                <input class="form-control {{ $errors->has('spouse') ? 'is-invalid' : '' }}" type="text" name="spouse" id="spouse" value="{{ old('spouse', '') }}">
                @if($errors->has('spouse'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.spouse_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_birth">{{ trans('cruds.admission.fields.spouse_birth') }}</label>
                <input class="form-control date {{ $errors->has('spouse_birth') ? 'is-invalid' : '' }}" type="text" name="spouse_birth" id="spouse_birth" value="{{ old('spouse_birth') }}">
                @if($errors->has('spouse_birth'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_birth') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.spouse_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_cpf">{{ trans('cruds.admission.fields.spouse_cpf') }}</label>
                <input class="form-control {{ $errors->has('spouse_cpf') ? 'is-invalid' : '' }}" type="text" name="spouse_cpf" id="spouse_cpf" value="{{ old('spouse_cpf', '') }}">
                @if($errors->has('spouse_cpf'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_cpf') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.spouse_cpf_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="spouse_rg">{{ trans('cruds.admission.fields.spouse_rg') }}</label>
                <input class="form-control {{ $errors->has('spouse_rg') ? 'is-invalid' : '' }}" type="text" name="spouse_rg" id="spouse_rg" value="{{ old('spouse_rg', '') }}">
                @if($errors->has('spouse_rg'))
                    <div class="invalid-feedback">
                        {{ $errors->first('spouse_rg') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.spouse_rg_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.children') }}</label>
                @foreach(App\Models\Admission::CHILDREN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('children') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="children_{{ $key }}" name="children" value="{{ $key }}" {{ old('children', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="children_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('children'))
                    <div class="invalid-feedback">
                        {{ $errors->first('children') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.children_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="children_qtd">{{ trans('cruds.admission.fields.children_qtd') }}</label>
                <input class="form-control {{ $errors->has('children_qtd') ? 'is-invalid' : '' }}" type="number" name="children_qtd" id="children_qtd" value="{{ old('children_qtd', '') }}" step="1">
                @if($errors->has('children_qtd'))
                    <div class="invalid-feedback">
                        {{ $errors->first('children_qtd') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.children_qtd_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.mother') }}</label>
                @foreach(App\Models\Admission::MOTHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('mother') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="mother_{{ $key }}" name="mother" value="{{ $key }}" {{ old('mother', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="mother_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('mother'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.mother_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.father') }}</label>
                @foreach(App\Models\Admission::FATHER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('father') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="father_{{ $key }}" name="father" value="{{ $key }}" {{ old('father', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="father_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('father'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.father_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.foreigner') }}</label>
                @foreach(App\Models\Admission::FOREIGNER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('foreigner') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="foreigner_{{ $key }}" name="foreigner" value="{{ $key }}" {{ old('foreigner', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="foreigner_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('foreigner'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foreigner') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.foreigner_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.education_level') }}</label>
                <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" name="education_level" id="education_level">
                    <option value disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::EDUCATION_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education_level', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('education_level') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.education_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.level_education') }}</label>
                <select class="form-control {{ $errors->has('level_education') ? 'is-invalid' : '' }}" name="level_education" id="level_education">
                    <option value disabled {{ old('level_education', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::LEVEL_EDUCATION_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('level_education', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('level_education'))
                    <div class="invalid-feedback">
                        {{ $errors->first('level_education') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.level_education_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_courses">{{ trans('cruds.admission.fields.other_courses') }}</label>
                <input class="form-control {{ $errors->has('other_courses') ? 'is-invalid' : '' }}" type="text" name="other_courses" id="other_courses" value="{{ old('other_courses', '') }}">
                @if($errors->has('other_courses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('other_courses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.other_courses_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.skin') }}</label>
                <select class="form-control {{ $errors->has('skin') ? 'is-invalid' : '' }}" name="skin" id="skin">
                    <option value disabled {{ old('skin', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::SKIN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('skin', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('skin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('skin') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.skin_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.special_need') }}</label>
                <select class="form-control {{ $errors->has('special_need') ? 'is-invalid' : '' }}" name="special_need" id="special_need">
                    <option value disabled {{ old('special_need', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Admission::SPECIAL_NEED_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('special_need', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('special_need'))
                    <div class="invalid-feedback">
                        {{ $errors->first('special_need') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.special_need_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="deficiency">{{ trans('cruds.admission.fields.deficiency') }}</label>
                <textarea class="form-control {{ $errors->has('deficiency') ? 'is-invalid' : '' }}" name="deficiency" id="deficiency">{{ old('deficiency') }}</textarea>
                @if($errors->has('deficiency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deficiency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.deficiency_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.relative') }}</label>
                @foreach(App\Models\Admission::RELATIVE_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('relative') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="relative_{{ $key }}" name="relative" value="{{ $key }}" {{ old('relative', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="relative_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('relative'))
                    <div class="invalid-feedback">
                        {{ $errors->first('relative') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.relative_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relative_name">{{ trans('cruds.admission.fields.relative_name') }}</label>
                <input class="form-control {{ $errors->has('relative_name') ? 'is-invalid' : '' }}" type="text" name="relative_name" id="relative_name" value="{{ old('relative_name', '') }}">
                @if($errors->has('relative_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('relative_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.relative_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="relative_kinship">{{ trans('cruds.admission.fields.relative_kinship') }}</label>
                <input class="form-control {{ $errors->has('relative_kinship') ? 'is-invalid' : '' }}" type="text" name="relative_kinship" id="relative_kinship" value="{{ old('relative_kinship', '') }}">
                @if($errors->has('relative_kinship'))
                    <div class="invalid-feedback">
                        {{ $errors->first('relative_kinship') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.relative_kinship_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.car') }}</label>
                @foreach(App\Models\Admission::CAR_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('car') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="car_{{ $key }}" name="car" value="{{ $key }}" {{ old('car', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="car_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('car'))
                    <div class="invalid-feedback">
                        {{ $errors->first('car') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.car_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.admission.fields.first_job') }}</label>
                @foreach(App\Models\Admission::FIRST_JOB_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('first_job') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="first_job_{{ $key }}" name="first_job" value="{{ $key }}" {{ old('first_job', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="first_job_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('first_job'))
                    <div class="invalid-feedback">
                        {{ $errors->first('first_job') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.first_job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tshirt">{{ trans('cruds.admission.fields.tshirt') }}</label>
                <input class="form-control {{ $errors->has('tshirt') ? 'is-invalid' : '' }}" type="text" name="tshirt" id="tshirt" value="{{ old('tshirt', '') }}">
                @if($errors->has('tshirt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tshirt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.tshirt_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pants">{{ trans('cruds.admission.fields.pants') }}</label>
                <input class="form-control {{ $errors->has('pants') ? 'is-invalid' : '' }}" type="text" name="pants" id="pants" value="{{ old('pants', '') }}">
                @if($errors->has('pants'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pants') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.pants_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="boot">{{ trans('cruds.admission.fields.boot') }}</label>
                <input class="form-control {{ $errors->has('boot') ? 'is-invalid' : '' }}" type="text" name="boot" id="boot" value="{{ old('boot', '') }}">
                @if($errors->has('boot'))
                    <div class="invalid-feedback">
                        {{ $errors->first('boot') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.boot_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank">{{ trans('cruds.admission.fields.bank') }}</label>
                <input class="form-control {{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" id="bank" value="{{ old('bank', '') }}">
                @if($errors->has('bank'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.bank_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_account">{{ trans('cruds.admission.fields.bank_account') }}</label>
                <input class="form-control {{ $errors->has('bank_account') ? 'is-invalid' : '' }}" type="text" name="bank_account" id="bank_account" value="{{ old('bank_account', '') }}">
                @if($errors->has('bank_account'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_account') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.bank_account_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_type">{{ trans('cruds.admission.fields.bank_type') }}</label>
                <input class="form-control {{ $errors->has('bank_type') ? 'is-invalid' : '' }}" type="text" name="bank_type" id="bank_type" value="{{ old('bank_type', '') }}">
                @if($errors->has('bank_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.bank_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_agency">{{ trans('cruds.admission.fields.bank_agency') }}</label>
                <input class="form-control {{ $errors->has('bank_agency') ? 'is-invalid' : '' }}" type="text" name="bank_agency" id="bank_agency" value="{{ old('bank_agency', '') }}">
                @if($errors->has('bank_agency'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_agency') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.bank_agency_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="operation">{{ trans('cruds.admission.fields.operation') }}</label>
                <input class="form-control {{ $errors->has('operation') ? 'is-invalid' : '' }}" type="text" name="operation" id="operation" value="{{ old('operation', '') }}">
                @if($errors->has('operation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('operation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.operation_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pix">{{ trans('cruds.admission.fields.pix') }}</label>
                <input class="form-control {{ $errors->has('pix') ? 'is-invalid' : '' }}" type="text" name="pix" id="pix" value="{{ old('pix', '') }}">
                @if($errors->has('pix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.pix_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_declaration">{{ trans('cruds.admission.fields.date_declaration') }}</label>
                <input class="form-control date {{ $errors->has('date_declaration') ? 'is-invalid' : '' }}" type="text" name="date_declaration" id="date_declaration" value="{{ old('date_declaration') }}">
                @if($errors->has('date_declaration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_declaration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.admission.fields.date_declaration_helper') }}</span>
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
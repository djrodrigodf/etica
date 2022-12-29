@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.admission.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.id') }}
                        </th>
                        <td>
                            {{ $admission->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.company') }}
                        </th>
                        <td>
                            {{ $admission->company->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.construction') }}
                        </th>
                        <td>
                            {{ $admission->construction->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.partner') }}
                        </th>
                        <td>
                            {{ $admission->partner->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.occupation') }}
                        </th>
                        <td>
                            {{ $admission->occupation->office ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.salary') }}
                        </th>
                        <td>
                            {{ $admission->salary->value ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.admission_date') }}
                        </th>
                        <td>
                            {{ $admission->admission_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.rg') }}
                        </th>
                        <td>
                            {{ $admission->rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.ctps') }}
                        </th>
                        <td>
                            {{ $admission->ctps }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.serial') }}
                        </th>
                        <td>
                            {{ $admission->serial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.uf') }}
                        </th>
                        <td>
                            {{ $admission->uf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::GENDER_SELECT[$admission->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.birth') }}
                        </th>
                        <td>
                            {{ $admission->birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.naturalness') }}
                        </th>
                        <td>
                            {{ $admission->naturalness }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.phone_contact') }}
                        </th>
                        <td>
                            {{ $admission->phone_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.phone_message') }}
                        </th>
                        <td>
                            {{ $admission->phone_message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.marital_status') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::MARITAL_STATUS_SELECT[$admission->marital_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.spouse') }}
                        </th>
                        <td>
                            {{ $admission->spouse }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_birth') }}
                        </th>
                        <td>
                            {{ $admission->spouse_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_cpf') }}
                        </th>
                        <td>
                            {{ $admission->spouse_cpf }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_rg') }}
                        </th>
                        <td>
                            {{ $admission->spouse_rg }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.children') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::CHILDREN_RADIO[$admission->children] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.children_qtd') }}
                        </th>
                        <td>
                            {{ $admission->children_qtd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.mother') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::MOTHER_RADIO[$admission->mother] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.father') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::FATHER_RADIO[$admission->father] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.foreigner') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::FOREIGNER_RADIO[$admission->foreigner] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.education_level') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::EDUCATION_LEVEL_SELECT[$admission->education_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.level_education') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::LEVEL_EDUCATION_SELECT[$admission->level_education] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.other_courses') }}
                        </th>
                        <td>
                            {{ $admission->other_courses }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.skin') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::SKIN_SELECT[$admission->skin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.special_need') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::SPECIAL_NEED_SELECT[$admission->special_need] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.deficiency') }}
                        </th>
                        <td>
                            {{ $admission->deficiency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.relative') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::RELATIVE_RADIO[$admission->relative] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.relative_name') }}
                        </th>
                        <td>
                            {{ $admission->relative_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.relative_kinship') }}
                        </th>
                        <td>
                            {{ $admission->relative_kinship }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.car') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::CAR_RADIO[$admission->car] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.first_job') }}
                        </th>
                        <td>
                            {{ App\Models\Admission::FIRST_JOB_RADIO[$admission->first_job] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.tshirt') }}
                        </th>
                        <td>
                            {{ $admission->tshirt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.pants') }}
                        </th>
                        <td>
                            {{ $admission->pants }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.boot') }}
                        </th>
                        <td>
                            {{ $admission->boot }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.bank') }}
                        </th>
                        <td>
                            {{ $admission->bank }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.bank_account') }}
                        </th>
                        <td>
                            {{ $admission->bank_account }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.bank_type') }}
                        </th>
                        <td>
                            {{ $admission->bank_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.bank_agency') }}
                        </th>
                        <td>
                            {{ $admission->bank_agency }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.operation') }}
                        </th>
                        <td>
                            {{ $admission->operation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.pix') }}
                        </th>
                        <td>
                            {{ $admission->pix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.admission.fields.date_declaration') }}
                        </th>
                        <td>
                            {{ $admission->date_declaration }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.admissions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
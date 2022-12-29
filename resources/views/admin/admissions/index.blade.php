@extends('layouts.admin')
@section('content')
@can('admission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.admissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.admission.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Admission', 'route' => 'admin.admissions.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.admission.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Admission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.construction') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.occupation') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.admission_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.rg') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.ctps') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.serial') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.uf') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.naturalness') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.phone_contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.phone_message') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.marital_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.spouse') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_cpf') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.spouse_rg') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.children') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.children_qtd') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.mother') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.father') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.foreigner') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.education_level') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.level_education') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.other_courses') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.skin') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.special_need') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.deficiency') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.relative') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.relative_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.relative_kinship') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.car') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.first_job') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.tshirt') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.pants') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.boot') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.bank') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.bank_account') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.bank_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.bank_agency') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.operation') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.pix') }}
                        </th>
                        <th>
                            {{ trans('cruds.admission.fields.date_declaration') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($companies as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($constructions as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($business_partners as $key => $item)
                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($occupations as $key => $item)
                                    <option value="{{ $item->office }}">{{ $item->office }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($salaries as $key => $item)
                                    <option value="{{ $item->value }}">{{ $item->value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::GENDER_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::MARITAL_STATUS_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::CHILDREN_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::MOTHER_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::FATHER_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::FOREIGNER_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::EDUCATION_LEVEL_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::LEVEL_EDUCATION_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::SKIN_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::SPECIAL_NEED_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::RELATIVE_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::CAR_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\Admission::FIRST_JOB_RADIO as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admissions as $key => $admission)
                        <tr data-entry-id="{{ $admission->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $admission->id ?? '' }}
                            </td>
                            <td>
                                {{ $admission->company->name ?? '' }}
                            </td>
                            <td>
                                {{ $admission->construction->name ?? '' }}
                            </td>
                            <td>
                                {{ $admission->partner->name ?? '' }}
                            </td>
                            <td>
                                {{ $admission->occupation->office ?? '' }}
                            </td>
                            <td>
                                {{ $admission->salary->value ?? '' }}
                            </td>
                            <td>
                                {{ $admission->admission_date ?? '' }}
                            </td>
                            <td>
                                {{ $admission->rg ?? '' }}
                            </td>
                            <td>
                                {{ $admission->ctps ?? '' }}
                            </td>
                            <td>
                                {{ $admission->serial ?? '' }}
                            </td>
                            <td>
                                {{ $admission->uf ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::GENDER_SELECT[$admission->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->birth ?? '' }}
                            </td>
                            <td>
                                {{ $admission->naturalness ?? '' }}
                            </td>
                            <td>
                                {{ $admission->phone_contact ?? '' }}
                            </td>
                            <td>
                                {{ $admission->phone_message ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::MARITAL_STATUS_SELECT[$admission->marital_status] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->spouse ?? '' }}
                            </td>
                            <td>
                                {{ $admission->spouse_birth ?? '' }}
                            </td>
                            <td>
                                {{ $admission->spouse_cpf ?? '' }}
                            </td>
                            <td>
                                {{ $admission->spouse_rg ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::CHILDREN_RADIO[$admission->children] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->children_qtd ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::MOTHER_RADIO[$admission->mother] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::FATHER_RADIO[$admission->father] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::FOREIGNER_RADIO[$admission->foreigner] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::EDUCATION_LEVEL_SELECT[$admission->education_level] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::LEVEL_EDUCATION_SELECT[$admission->level_education] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->other_courses ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::SKIN_SELECT[$admission->skin] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::SPECIAL_NEED_SELECT[$admission->special_need] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->deficiency ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::RELATIVE_RADIO[$admission->relative] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->relative_name ?? '' }}
                            </td>
                            <td>
                                {{ $admission->relative_kinship ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::CAR_RADIO[$admission->car] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Admission::FIRST_JOB_RADIO[$admission->first_job] ?? '' }}
                            </td>
                            <td>
                                {{ $admission->tshirt ?? '' }}
                            </td>
                            <td>
                                {{ $admission->pants ?? '' }}
                            </td>
                            <td>
                                {{ $admission->boot ?? '' }}
                            </td>
                            <td>
                                {{ $admission->bank ?? '' }}
                            </td>
                            <td>
                                {{ $admission->bank_account ?? '' }}
                            </td>
                            <td>
                                {{ $admission->bank_type ?? '' }}
                            </td>
                            <td>
                                {{ $admission->bank_agency ?? '' }}
                            </td>
                            <td>
                                {{ $admission->operation ?? '' }}
                            </td>
                            <td>
                                {{ $admission->pix ?? '' }}
                            </td>
                            <td>
                                {{ $admission->date_declaration ?? '' }}
                            </td>
                            <td>
                                @can('admission_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.admissions.show', $admission->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('admission_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.admissions.edit', $admission->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('admission_delete')
                                    <form action="{{ route('admin.admissions.destroy', $admission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('admission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.admissions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-Admission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection
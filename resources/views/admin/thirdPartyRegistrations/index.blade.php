@extends('layouts.admin')
@section('content')
@can('third_party_registration_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.third-party-registrations.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.thirdPartyRegistration.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ThirdPartyRegistration', 'route' => 'admin.third-party-registrations.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.thirdPartyRegistration.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ThirdPartyRegistration">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.construction') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.occupation') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.date_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.date_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.accommodation') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.food') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.epi') }}
                        </th>
                        <th>
                            {{ trans('cruds.thirdPartyRegistration.fields.transport') }}
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
                                @foreach($business_partners as $key => $item)
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
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                        </td>
                        <td>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ThirdPartyRegistration::ACCOMMODATION_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ThirdPartyRegistration::FOOD_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ThirdPartyRegistration::EPI_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Models\ThirdPartyRegistration::TRANSPORT_SELECT as $key => $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($thirdPartyRegistrations as $key => $thirdPartyRegistration)
                        <tr data-entry-id="{{ $thirdPartyRegistration->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $thirdPartyRegistration->id ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->partner->name ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->construction->name ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->contract ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->occupation->office ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->date_start ?? '' }}
                            </td>
                            <td>
                                {{ $thirdPartyRegistration->date_end ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ThirdPartyRegistration::ACCOMMODATION_SELECT[$thirdPartyRegistration->accommodation] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ThirdPartyRegistration::FOOD_SELECT[$thirdPartyRegistration->food] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ThirdPartyRegistration::EPI_SELECT[$thirdPartyRegistration->epi] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ThirdPartyRegistration::TRANSPORT_SELECT[$thirdPartyRegistration->transport] ?? '' }}
                            </td>
                            <td>
                                @can('third_party_registration_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.third-party-registrations.show', $thirdPartyRegistration->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('third_party_registration_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.third-party-registrations.edit', $thirdPartyRegistration->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('third_party_registration_delete')
                                    <form action="{{ route('admin.third-party-registrations.destroy', $thirdPartyRegistration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('third_party_registration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.third-party-registrations.massDestroy') }}",
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
  let table = $('.datatable-ThirdPartyRegistration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
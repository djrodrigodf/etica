@extends('layouts.admin')
@section('content')
@can('business_partner_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.business-partners.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.businessPartner.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'BusinessPartner', 'route' => 'admin.business-partners.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.businessPartner.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-BusinessPartner">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.cnpj_cpf') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.ie') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.zip_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.number') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.complement') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.district') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.state') }}
                        </th>
                        <th>
                            {{ trans('cruds.businessPartner.fields.country') }}
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($businessPartners as $key => $businessPartner)
                        <tr data-entry-id="{{ $businessPartner->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $businessPartner->id ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->name ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->cnpj_cpf ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->ie ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->phone ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->email ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->zip_code ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->address ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->number ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->complement ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->district ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->city ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->state ?? '' }}
                            </td>
                            <td>
                                {{ $businessPartner->country ?? '' }}
                            </td>
                            <td>
                                @can('business_partner_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.business-partners.show', $businessPartner->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('business_partner_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.business-partners.edit', $businessPartner->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('business_partner_delete')
                                    <form action="{{ route('admin.business-partners.destroy', $businessPartner->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('business_partner_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.business-partners.massDestroy') }}",
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
  let table = $('.datatable-BusinessPartner:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
@can('hiring_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.hirings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.hiring.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.hiring.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-partnerHirings">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.construction') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.date_birth') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.occupation') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.capacity') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.beginning') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.finish') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.clt') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.registration') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.health_plan') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.vehicle_rental') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.laptop_rental') }}
                        </th>
                        <th>
                            {{ trans('cruds.hiring.fields.phone_plan') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hirings as $key => $hiring)
                        <tr data-entry-id="{{ $hiring->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $hiring->id ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->construction->name ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->partner->name ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->date_birth ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->occupation->office ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->salary ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->company->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Hiring::CAPACITY_SELECT[$hiring->capacity] ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->beginning ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->finish ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Hiring::CLT_RADIO[$hiring->clt] ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->registration ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->health_plan ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->vehicle_rental ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->laptop_rental ?? '' }}
                            </td>
                            <td>
                                {{ $hiring->phone_plan ?? '' }}
                            </td>
                            <td>
                                @can('hiring_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.hirings.show', $hiring->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('hiring_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.hirings.edit', $hiring->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('hiring_delete')
                                    <form action="{{ route('admin.hirings.destroy', $hiring->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('hiring_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.hirings.massDestroy') }}",
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
  let table = $('.datatable-partnerHirings:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
@can('construction_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.constructions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.construction.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.construction.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-teamConstructions">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.project_mega') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.public_agency') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.situation') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.work_group') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.copartner') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.team') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.iss') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.tax') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.partner_percentage') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.role') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.administration_fee') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.reserve_fund') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.public_notice_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.average_discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.budget_base_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.proposal_base_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.use_base_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.contract_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.contract_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.contract_publication_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.deadline_contract') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.start_order_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.cei_registration') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.cnpj_branch') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.policy_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.construction_site_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.construction.fields.site_address') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($constructions as $key => $construction)
                        <tr data-entry-id="{{ $construction->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $construction->id ?? '' }}
                            </td>
                            <td>
                                {{ $construction->project_mega ?? '' }}
                            </td>
                            <td>
                                {{ $construction->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Construction::PUBLIC_AGENCY_SELECT[$construction->public_agency] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Construction::SITUATION_SELECT[$construction->situation] ?? '' }}
                            </td>
                            <td>
                                {{ $construction->work_group ?? '' }}
                            </td>
                            <td>
                                {{ $construction->copartner ?? '' }}
                            </td>
                            <td>
                                @foreach($construction->teams as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $construction->iss ?? '' }}
                            </td>
                            <td>
                                {{ $construction->tax ?? '' }}
                            </td>
                            <td>
                                {{ $construction->partner_percentage ?? '' }}
                            </td>
                            <td>
                                {{ $construction->role ?? '' }}
                            </td>
                            <td>
                                {{ $construction->administration_fee ?? '' }}
                            </td>
                            <td>
                                {{ $construction->reserve_fund ?? '' }}
                            </td>
                            <td>
                                {{ $construction->public_notice_number ?? '' }}
                            </td>
                            <td>
                                {{ $construction->average_discount ?? '' }}
                            </td>
                            <td>
                                {{ $construction->budget_base_date ?? '' }}
                            </td>
                            <td>
                                {{ $construction->proposal_base_date ?? '' }}
                            </td>
                            <td>
                                {{ $construction->use_base_date ?? '' }}
                            </td>
                            <td>
                                {{ $construction->contract_value ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Construction::TYPE_SELECT[$construction->type] ?? '' }}
                            </td>
                            <td>
                                {{ $construction->contract_number ?? '' }}
                            </td>
                            <td>
                                {{ $construction->contract_publication_date ?? '' }}
                            </td>
                            <td>
                                {{ $construction->deadline_contract ?? '' }}
                            </td>
                            <td>
                                {{ $construction->start_order_date ?? '' }}
                            </td>
                            <td>
                                {{ $construction->cei_registration ?? '' }}
                            </td>
                            <td>
                                {{ $construction->cnpj_branch ?? '' }}
                            </td>
                            <td>
                                {{ $construction->policy_value ?? '' }}
                            </td>
                            <td>
                                {{ $construction->construction_site_city ?? '' }}
                            </td>
                            <td>
                                {{ $construction->site_address ?? '' }}
                            </td>
                            <td>
                                @can('construction_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.constructions.show', $construction->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('construction_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.constructions.edit', $construction->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('construction_delete')
                                    <form action="{{ route('admin.constructions.destroy', $construction->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('construction_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.constructions.massDestroy') }}",
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
  let table = $('.datatable-teamConstructions:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
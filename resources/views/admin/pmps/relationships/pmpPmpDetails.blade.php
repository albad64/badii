<div class="m-3">
    @can('pmp_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.pmp-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.pmpDetail.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.pmpDetail.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-pmpPmpDetails">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.pmp') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.number_detail') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.weight') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.kpi_description') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.target') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.mid_year_evaluation') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.mid_year_weight') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.mid_year_notes') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.end_year_evaluation') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.end_year_weight') }}
                            </th>
                            <th>
                                {{ trans('cruds.pmpDetail.fields.end_year_notes') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pmpDetails as $key => $pmpDetail)
                            <tr data-entry-id="{{ $pmpDetail->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $pmpDetail->id ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->pmp->pmp_year ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->number_detail ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->weight ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->kpi_description ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->target ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->mid_year_evaluation ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->mid_year_weight ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->mid_year_notes ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->end_year_evaluation ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->end_year_weight ?? '' }}
                                </td>
                                <td>
                                    {{ $pmpDetail->end_year_notes ?? '' }}
                                </td>
                                <td>
                                    @can('pmp_detail_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.pmp-details.show', $pmpDetail->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('pmp_detail_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.pmp-details.edit', $pmpDetail->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('pmp_detail_delete')
                                        <form action="{{ route('admin.pmp-details.destroy', $pmpDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('pmp_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pmp-details.massDestroy') }}",
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
    order: [[ 2, 'asc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-pmpPmpDetails:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
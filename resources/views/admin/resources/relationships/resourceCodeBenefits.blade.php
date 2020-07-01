<div class="m-3">
    @can('benefit_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.benefits.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.benefit.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.benefit.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-resourceCodeBenefits">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.resource_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.resource.fields.first_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.resource.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.benefit_extra_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.benefit_type') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.assigned_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.expired_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.currency') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.total_cost') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.optional_value') }}
                            </th>
                            <th>
                                {{ trans('cruds.benefit.fields.fringe_benefit') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($benefits as $key => $benefit)
                            <tr data-entry-id="{{ $benefit->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $benefit->id ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->resource_code->resource_code ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->resource_code->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->resource_code->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Benefit::BENEFIT_EXTRA_TYPE_SELECT[$benefit->benefit_extra_type] ?? '' }}
                                </td>
                                <td>
                                    {{ App\Benefit::BENEFIT_TYPE_SELECT[$benefit->benefit_type] ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->assigned_date ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->expired_date ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->currency->code ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->total_cost ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->optional_value ?? '' }}
                                </td>
                                <td>
                                    {{ $benefit->fringe_benefit ?? '' }}
                                </td>
                                <td>
                                    @can('benefit_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.benefits.show', $benefit->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('benefit_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.benefits.edit', $benefit->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('benefit_delete')
                                        <form action="{{ route('admin.benefits.destroy', $benefit->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('benefit_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.benefits.massDestroy') }}",
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
  let table = $('.datatable-resourceCodeBenefits:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
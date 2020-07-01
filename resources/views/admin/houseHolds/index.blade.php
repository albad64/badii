@extends('layouts.admin')
@section('content')
@can('house_hold_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.house-holds.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.houseHold.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.houseHold.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-HouseHold">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.resource_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.prog') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.relationship_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.relative_first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.relative_last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.houseHold.fields.percentage_charged') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($houseHolds as $key => $houseHold)
                        <tr data-entry-id="{{ $houseHold->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $houseHold->id ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->prog ?? '' }}
                            </td>
                            <td>
                                {{ App\HouseHold::RELATIONSHIP_TYPE_SELECT[$houseHold->relationship_type] ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->relative_first_name ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->relative_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $houseHold->percentage_charged ?? '' }}
                            </td>
                            <td>
                                @can('house_hold_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.house-holds.show', $houseHold->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('house_hold_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.house-holds.edit', $houseHold->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('house_hold_delete')
                                    <form action="{{ route('admin.house-holds.destroy', $houseHold->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('house_hold_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.house-holds.massDestroy') }}",
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
  let table = $('.datatable-HouseHold:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
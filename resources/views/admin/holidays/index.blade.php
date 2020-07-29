@extends('layouts.admin')
@section('content')
@can('holiday_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.holidays.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.holiday.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.holiday.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Holiday">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.resource_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holidays_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_year') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_month') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_residual') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_actual') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.holiday_enjoyed') }}
                        </th>
                        <th>
                            {{ trans('cruds.holiday.fields.status') }}
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
                                @foreach($resources as $key => $item)
                                    <option value="{{ $item->resource_code }}">{{ $item->resource_code }}</option>
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
                                @foreach(App\Holiday::HOLIDAYS_TYPE_SELECT as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
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
                            <select class="search" strict="true">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach(App\Holiday::STATUS_RADIO as $key => $item)
                                    <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($holidays as $key => $holiday)
                        <tr data-entry-id="{{ $holiday->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $holiday->id ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ App\Holiday::HOLIDAYS_TYPE_SELECT[$holiday->holidays_type] ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->holiday_year ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->holiday_month ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->holiday_residual ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->holiday_actual ?? '' }}
                            </td>
                            <td>
                                {{ $holiday->holiday_enjoyed ?? '' }}
                            </td>
                            <td>
                                {{ App\Holiday::STATUS_RADIO[$holiday->status] ?? '' }}
                            </td>
                            <td>
                                @can('holiday_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.holidays.show', $holiday->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('holiday_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.holidays.edit', $holiday->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('holiday_delete')
                                    <form action="{{ route('admin.holidays.destroy', $holiday->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('holiday_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.holidays.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-Holiday:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
})

</script>
@endsection
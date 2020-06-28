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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Holiday">
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
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Holiday::HOLIDAYS_TYPE_SELECT as $key => $item)
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
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Holiday::STATUS_RADIO as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('holiday_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.holidays.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.holidays.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code_resource_code', name: 'resource_code.resource_code' },
{ data: 'resource_code.first_name', name: 'resource_code.first_name' },
{ data: 'resource_code.last_name', name: 'resource_code.last_name' },
{ data: 'holidays_type', name: 'holidays_type' },
{ data: 'holiday_year', name: 'holiday_year' },
{ data: 'holiday_month', name: 'holiday_month' },
{ data: 'holiday_residual', name: 'holiday_residual' },
{ data: 'holiday_actual', name: 'holiday_actual' },
{ data: 'holiday_enjoyed', name: 'holiday_enjoyed' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Holiday').DataTable(dtOverrideGlobals);
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
});

</script>
@endsection
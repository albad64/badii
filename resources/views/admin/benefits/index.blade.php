@extends('layouts.admin')
@section('content')
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Benefit">
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('benefit_delete')
<<<<<<< HEAD
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
=======
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.benefits.massDestroy') }}",
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

<<<<<<< HEAD
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.benefits.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code_resource_code', name: 'resource_code.resource_code' },
{ data: 'resource_code.first_name', name: 'resource_code.first_name' },
{ data: 'resource_code.last_name', name: 'resource_code.last_name' },
{ data: 'benefit_extra_type', name: 'benefit_extra_type' },
{ data: 'benefit_type', name: 'benefit_type' },
{ data: 'assigned_date', name: 'assigned_date' },
{ data: 'expired_date', name: 'expired_date' },
{ data: 'currency_code', name: 'currency.code' },
{ data: 'total_cost', name: 'total_cost' },
{ data: 'optional_value', name: 'optional_value' },
{ data: 'fringe_benefit', name: 'fringe_benefit' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Benefit').DataTable(dtOverrideGlobals);
=======
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Benefit:not(.ajaxTable)').DataTable({ buttons: dtButtons })
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

<<<<<<< HEAD
});
=======
})
>>>>>>> quickadminpanel_2020_06_28_07_35_51

</script>
@endsection

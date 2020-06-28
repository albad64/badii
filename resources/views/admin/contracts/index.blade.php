@extends('layouts.admin')
@section('content')
@can('contract_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.contracts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.contract.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.contract.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Contract">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.resource_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.company') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.head_office') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract_duration') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.contract_time') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.area_type') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.termination_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.termination_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.calculation_lps') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.ccnl') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.clb_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.clb_level') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.us_category') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.end_trial_period_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.weekly_working_hours') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.report_resource_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.hr_canteen_charge') }}
                    </th>
                    <th>
                        {{ trans('cruds.contract.fields.notes') }}
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
@can('contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contracts.massDestroy') }}",
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
    ajax: "{{ route('admin.contracts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code_resource_code', name: 'resource_code.resource_code' },
{ data: 'resource_code.first_name', name: 'resource_code.first_name' },
{ data: 'resource_code.last_name', name: 'resource_code.last_name' },
{ data: 'start_date', name: 'start_date' },
{ data: 'end_date', name: 'end_date' },
{ data: 'company_company', name: 'company.company' },
{ data: 'head_office', name: 'head_office' },
{ data: 'contract_type', name: 'contract_type' },
{ data: 'contract_duration', name: 'contract_duration' },
{ data: 'contract_time', name: 'contract_time' },
{ data: 'area_type', name: 'area_type' },
{ data: 'termination_date', name: 'termination_date' },
{ data: 'termination_code', name: 'termination_code' },
{ data: 'calculation_lps', name: 'calculation_lps' },
{ data: 'ccnl', name: 'ccnl' },
{ data: 'clb_category', name: 'clb_category' },
{ data: 'clb_level', name: 'clb_level' },
{ data: 'us_category', name: 'us_category' },
{ data: 'end_trial_period_date', name: 'end_trial_period_date' },
{ data: 'weekly_working_hours', name: 'weekly_working_hours' },
{ data: 'report_resource_code_resource_code', name: 'report_resource_code.resource_code' },
{ data: 'hr_canteen_charge', name: 'hr_canteen_charge' },
{ data: 'notes', name: 'notes' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Contract').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

});

</script>
@endsection

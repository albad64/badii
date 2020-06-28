@extends('layouts.admin')
@section('content')
@can('salary_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.salaries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.salary.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.salary.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Salary">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.resource_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.start_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.remote_job') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.work_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.week_working_string') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.currency') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.internal_department') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.internal_office') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.annual_base_salary') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.vat_daily_fee') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.vat_daily_cost') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.staffing_agency_amount') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.staffing_agency_end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.reimb_km') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.nca') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.nca_end_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.nca_frequency') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.nca_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.expected_next_lsb_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.monthly_lsb') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.variable_comp_target') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.variable_comp_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.salary.fields.notes') }}
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
@can('salary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salaries.massDestroy') }}",
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
    ajax: "{{ route('admin.salaries.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code_resource_code', name: 'resource_code.resource_code' },
{ data: 'resource_code.first_name', name: 'resource_code.first_name' },
{ data: 'resource_code.last_name', name: 'resource_code.last_name' },
{ data: 'start_date', name: 'start_date' },
{ data: 'remote_job', name: 'remote_job' },
{ data: 'work_country_name', name: 'work_country.name' },
{ data: 'week_working_string', name: 'week_working_string' },
{ data: 'currency_code', name: 'currency.code' },
{ data: 'internal_department', name: 'internal_department' },
{ data: 'internal_office', name: 'internal_office' },
{ data: 'annual_base_salary', name: 'annual_base_salary' },
{ data: 'vat_daily_fee', name: 'vat_daily_fee' },
{ data: 'vat_daily_cost', name: 'vat_daily_cost' },
{ data: 'staffing_agency_amount', name: 'staffing_agency_amount' },
{ data: 'staffing_agency_end_date', name: 'staffing_agency_end_date' },
{ data: 'reimb_km', name: 'reimb_km' },
{ data: 'nca', name: 'nca' },
{ data: 'nca_end_date', name: 'nca_end_date' },
{ data: 'nca_frequency', name: 'nca_frequency' },
{ data: 'nca_value', name: 'nca_value' },
{ data: 'expected_next_lsb_date', name: 'expected_next_lsb_date' },
{ data: 'monthly_lsb', name: 'monthly_lsb' },
{ data: 'variable_comp_target', name: 'variable_comp_target' },
{ data: 'variable_comp_value', name: 'variable_comp_value' },
{ data: 'notes', name: 'notes' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Salary').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection
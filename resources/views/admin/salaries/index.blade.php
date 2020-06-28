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
<<<<<<< HEAD
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
=======
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Salary">
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
                <tbody>
                    @foreach($salaries as $key => $salary)
                        <tr data-entry-id="{{ $salary->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salary->id ?? '' }}
                            </td>
                            <td>
                                {{ $salary->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $salary->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $salary->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $salary->start_date ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $salary->remote_job ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $salary->remote_job ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $salary->work_country->name ?? '' }}
                            </td>
                            <td>
                                {{ $salary->week_working_string ?? '' }}
                            </td>
                            <td>
                                {{ $salary->currency->code ?? '' }}
                            </td>
                            <td>
                                {{ App\Salary::INTERNAL_DEPARTMENT_SELECT[$salary->internal_department] ?? '' }}
                            </td>
                            <td>
                                {{ App\Salary::INTERNAL_OFFICE_SELECT[$salary->internal_office] ?? '' }}
                            </td>
                            <td>
                                {{ $salary->annual_base_salary ?? '' }}
                            </td>
                            <td>
                                {{ $salary->vat_daily_fee ?? '' }}
                            </td>
                            <td>
                                {{ $salary->vat_daily_cost ?? '' }}
                            </td>
                            <td>
                                {{ $salary->staffing_agency_amount ?? '' }}
                            </td>
                            <td>
                                {{ $salary->staffing_agency_end_date ?? '' }}
                            </td>
                            <td>
                                {{ $salary->reimb_km ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $salary->nca ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $salary->nca ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $salary->nca_end_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Salary::NCA_FREQUENCY_SELECT[$salary->nca_frequency] ?? '' }}
                            </td>
                            <td>
                                {{ $salary->nca_value ?? '' }}
                            </td>
                            <td>
                                {{ $salary->expected_next_lsb_date ?? '' }}
                            </td>
                            <td>
                                {{ $salary->monthly_lsb ?? '' }}
                            </td>
                            <td>
                                {{ App\Salary::VARIABLE_COMP_TARGET_SELECT[$salary->variable_comp_target] ?? '' }}
                            </td>
                            <td>
                                {{ $salary->variable_comp_value ?? '' }}
                            </td>
                            <td>
                                {{ $salary->notes ?? '' }}
                            </td>
                            <td>
                                @can('salary_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.salaries.show', $salary->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('salary_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.salaries.edit', $salary->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('salary_delete')
                                    <form action="{{ route('admin.salaries.destroy', $salary->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
>>>>>>> quickadminpanel_2020_06_28_07_35_51
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('salary_delete')
<<<<<<< HEAD
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
=======
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salaries.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
<<<<<<< HEAD
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
=======
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
>>>>>>> quickadminpanel_2020_06_28_07_35_51
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
=======
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Salary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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
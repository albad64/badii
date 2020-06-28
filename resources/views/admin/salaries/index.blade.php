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
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('salary_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salaries.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Salary:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Contract">
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
                <tbody>
                    @foreach($contracts as $key => $contract)
                        <tr data-entry-id="{{ $contract->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $contract->id ?? '' }}
                            </td>
                            <td>
                                {{ $contract->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $contract->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $contract->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $contract->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $contract->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $contract->company->company ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::HEAD_OFFICE_SELECT[$contract->head_office] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CONTRACT_TYPE_SELECT[$contract->contract_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CONTRACT_DURATION_SELECT[$contract->contract_duration] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CONTRACT_TIME_SELECT[$contract->contract_time] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::AREA_TYPE_SELECT[$contract->area_type] ?? '' }}
                            </td>
                            <td>
                                {{ $contract->termination_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::TERMINATION_CODE_SELECT[$contract->termination_code] ?? '' }}
                            </td>
                            <td>
                                {{ $contract->calculation_lps ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CCNL_SELECT[$contract->ccnl] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CLB_CATEGORY_SELECT[$contract->clb_category] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::CLB_LEVEL_SELECT[$contract->clb_level] ?? '' }}
                            </td>
                            <td>
                                {{ App\Contract::US_CATEGORY_SELECT[$contract->us_category] ?? '' }}
                            </td>
                            <td>
                                {{ $contract->end_trial_period_date ?? '' }}
                            </td>
                            <td>
                                {{ $contract->weekly_working_hours ?? '' }}
                            </td>
                            <td>
                                {{ $contract->report_resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $contract->hr_canteen_charge ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $contract->hr_canteen_charge ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $contract->notes ?? '' }}
                            </td>
                            <td>
                                @can('contract_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contracts.show', $contract->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('contract_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.contracts.edit', $contract->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('contract_delete')
                                    <form action="{{ route('admin.contracts.destroy', $contract->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.contracts.massDestroy') }}",
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
  let table = $('.datatable-Contract:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
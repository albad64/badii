@extends('layouts.admin')
@section('content')
@can('companies_bank_holiday_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.companies-bank-holidays.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.companiesBankHoliday.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.companiesBankHoliday.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CompaniesBankHoliday">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.year') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.bank_holiday_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.bank_holiday_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesBankHoliday.fields.bank_holiday_fix') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companiesBankHolidays as $key => $companiesBankHoliday)
                        <tr data-entry-id="{{ $companiesBankHoliday->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $companiesBankHoliday->id ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->company->company ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->year ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->bank_holiday_date ?? '' }}
                            </td>
                            <td>
                                {{ $companiesBankHoliday->bank_holiday_name ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $companiesBankHoliday->bank_holiday_fix ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $companiesBankHoliday->bank_holiday_fix ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('companies_bank_holiday_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companies-bank-holidays.show', $companiesBankHoliday->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('companies_bank_holiday_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companies-bank-holidays.edit', $companiesBankHoliday->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('companies_bank_holiday_delete')
                                    <form action="{{ route('admin.companies-bank-holidays.destroy', $companiesBankHoliday->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('companies_bank_holiday_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companies-bank-holidays.massDestroy') }}",
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
  let table = $('.datatable-CompaniesBankHoliday:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
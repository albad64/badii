@extends('layouts.admin')
@section('content')
@can('companies_holiday_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.companies-holidays.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.companiesHoliday.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.companiesHoliday.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CompaniesHoliday">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.company') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.level') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.seniority') }}
                        </th>
                        <th>
                            {{ trans('cruds.companiesHoliday.fields.days_for_month') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companiesHolidays as $key => $companiesHoliday)
                        <tr data-entry-id="{{ $companiesHoliday->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $companiesHoliday->id ?? '' }}
                            </td>
                            <td>
                                {{ $companiesHoliday->company->company ?? '' }}
                            </td>
                            <td>
                                {{ $companiesHoliday->level ?? '' }}
                            </td>
                            <td>
                                {{ $companiesHoliday->seniority ?? '' }}
                            </td>
                            <td>
                                {{ $companiesHoliday->days_for_month ?? '' }}
                            </td>
                            <td>
                                @can('companies_holiday_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.companies-holidays.show', $companiesHoliday->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('companies_holiday_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.companies-holidays.edit', $companiesHoliday->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('companies_holiday_delete')
                                    <form action="{{ route('admin.companies-holidays.destroy', $companiesHoliday->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('companies_holiday_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.companies-holidays.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CompaniesHoliday:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
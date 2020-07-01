@extends('layouts.admin')
@section('content')
@can('pmp_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pmps.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pmp.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pmp.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Pmp">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.resource_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.first_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.last_name') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.pmp_year') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.current_grade') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.expected_grade') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.objective_value') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.objective_mid_review_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.objective_end_eval_date') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.overall_mid_year_evaluation') }}
                    </th>
                    <th>
                        {{ trans('cruds.pmp.fields.overall_end_year_evaluation') }}
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($job_grades as $key => $item)
                                <option value="{{ $item->job_grade_name }}">{{ $item->job_grade_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($job_grades as $key => $item)
                                <option value="{{ $item->job_grade_name }}">{{ $item->job_grade_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
@can('pmp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pmps.massDestroy') }}",
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
    ajax: "{{ route('admin.pmps.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code_resource_code', name: 'resource_code.resource_code' },
{ data: 'resource_code.first_name', name: 'resource_code.first_name' },
{ data: 'resource_code.last_name', name: 'resource_code.last_name' },
{ data: 'pmp_year', name: 'pmp_year' },
{ data: 'current_grade_job_grade_name', name: 'current_grade.job_grade_name' },
{ data: 'expected_grade_job_grade_name', name: 'expected_grade.job_grade_name' },
{ data: 'objective_value', name: 'objective_value' },
{ data: 'objective_mid_review_date', name: 'objective_mid_review_date' },
{ data: 'objective_end_eval_date', name: 'objective_end_eval_date' },
{ data: 'overall_mid_year_evaluation', name: 'overall_mid_year_evaluation' },
{ data: 'overall_end_year_evaluation', name: 'overall_end_year_evaluation' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 2, 'asc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Pmp').DataTable(dtOverrideGlobals);
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
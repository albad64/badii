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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pmp">
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
                </thead>
                <tbody>
                    @foreach($pmps as $key => $pmp)
                        <tr data-entry-id="{{ $pmp->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pmp->id ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->pmp_year ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->current_grade->job_grade_name ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->expected_grade->job_grade_name ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->objective_value ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->objective_mid_review_date ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->objective_end_eval_date ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->overall_mid_year_evaluation ?? '' }}
                            </td>
                            <td>
                                {{ $pmp->overall_end_year_evaluation ?? '' }}
                            </td>
                            <td>
                                @can('pmp_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pmps.show', $pmp->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pmp_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pmps.edit', $pmp->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pmp_delete')
                                    <form action="{{ route('admin.pmps.destroy', $pmp->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pmp_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pmps.massDestroy') }}",
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
  let table = $('.datatable-Pmp:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
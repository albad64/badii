@extends('layouts.admin')
@section('content')
@can('job_grade_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.job-grades.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jobGrade.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jobGrade.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JobGrade">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jobGrade.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_grade_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobGrade.fields.organizational_area') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_grade') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobGrade.fields.job_level') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobGrades as $key => $jobGrade)
                        <tr data-entry-id="{{ $jobGrade->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobGrade->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobGrade->job_grade_name ?? '' }}
                            </td>
                            <td>
                                {{ App\JobGrade::ORGANIZATIONAL_AREA_RADIO[$jobGrade->organizational_area] ?? '' }}
                            </td>
                            <td>
                                {{ App\JobGrade::JOB_GRADE_SELECT[$jobGrade->job_grade] ?? '' }}
                            </td>
                            <td>
                                {{ App\JobGrade::JOB_LEVEL_SELECT[$jobGrade->job_level] ?? '' }}
                            </td>
                            <td>
                                @can('job_grade_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.job-grades.show', $jobGrade->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_grade_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.job-grades.edit', $jobGrade->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_grade_delete')
                                    <form action="{{ route('admin.job-grades.destroy', $jobGrade->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('job_grade_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.job-grades.massDestroy') }}",
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
  let table = $('.datatable-JobGrade:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
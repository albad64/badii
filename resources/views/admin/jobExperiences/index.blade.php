@extends('layouts.admin')
@section('content')
@can('job_experience_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.job-experiences.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.jobExperience.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'JobExperience', 'route' => 'admin.job-experiences.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.jobExperience.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-JobExperience">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.resource_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.order_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.company_role') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.job_start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.jobExperience.fields.job_end_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jobExperiences as $key => $jobExperience)
                        <tr data-entry-id="{{ $jobExperience->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobExperience->id ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->resource_code->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->resource_code->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->resource_code->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->order_number ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->company_role ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->job_start_date ?? '' }}
                            </td>
                            <td>
                                {{ $jobExperience->job_end_date ?? '' }}
                            </td>
                            <td>
                                @can('job_experience_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.job-experiences.show', $jobExperience->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('job_experience_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.job-experiences.edit', $jobExperience->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('job_experience_delete')
                                    <form action="{{ route('admin.job-experiences.destroy', $jobExperience->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('job_experience_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.job-experiences.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-JobExperience:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
<div class="m-3">
    @can('education_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.education.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.education.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.education.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-resourceCodeEducation">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.education.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.resource_code') }}
                            </th>
                            <th>
                                {{ trans('cruds.resource.fields.first_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.resource.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.order_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.graduated_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.education_level') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.education_area') }}
                            </th>
                            <th>
                                {{ trans('cruds.education.fields.education_location') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($education as $key => $education)
                            <tr data-entry-id="{{ $education->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $education->id ?? '' }}
                                </td>
                                <td>
                                    {{ $education->resource_code->resource_code ?? '' }}
                                </td>
                                <td>
                                    {{ $education->resource_code->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $education->resource_code->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $education->order_number ?? '' }}
                                </td>
                                <td>
                                    {{ $education->graduated_year ?? '' }}
                                </td>
                                <td>
                                    {{ App\Education::EDUCATION_LEVEL_SELECT[$education->education_level] ?? '' }}
                                </td>
                                <td>
                                    {{ $education->education_area ?? '' }}
                                </td>
                                <td>
                                    {{ $education->education_location ?? '' }}
                                </td>
                                <td>
                                    @can('education_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.education.show', $education->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('education_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.education.edit', $education->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('education_delete')
                                        <form action="{{ route('admin.education.destroy', $education->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('education_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.education.massDestroy') }}",
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
  let table = $('.datatable-resourceCodeEducation:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
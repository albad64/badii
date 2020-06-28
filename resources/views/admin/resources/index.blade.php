@extends('layouts.admin')
@section('content')
@can('resource_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.resources.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.resource.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.resource.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Resource">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.resource_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.first_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.hired_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.termination_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.birth_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.birth_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.birth_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.nationality') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.marital_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.fiscal_code') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.vat_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.company_partner') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.protected_categories') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.disability_percentage') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.ice_person') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.ice_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.ice_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.address_street') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.address_city') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.address_postalcode') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.address_country') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.address_state') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.work_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.home_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.office_phone') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.home_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.work_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.other_email') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $key => $resource)
                        <tr data-entry-id="{{ $resource->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $resource->id ?? '' }}
                            </td>
                            <td>
                                {{ $resource->resource_code ?? '' }}
                            </td>
                            <td>
                                {{ $resource->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $resource->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $resource->hired_date ?? '' }}
                            </td>
                            <td>
                                {{ $resource->termination_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Resource::STATUS_SELECT[$resource->status] ?? '' }}
                            </td>
                            <td>
                                {{ App\Resource::TITLE_SELECT[$resource->title] ?? '' }}
                            </td>
                            <td>
                                @if($resource->photo)
                                    <a href="{{ $resource->photo->getUrl() }}" target="_blank">
                                        <img src="{{ $resource->photo->getUrl('thumb') }}" width="50px" height="50px">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ App\Resource::GENDER_SELECT[$resource->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $resource->birth_date ?? '' }}
                            </td>
                            <td>
                                {{ $resource->birth_city ?? '' }}
                            </td>
                            <td>
                                {{ $resource->birth_country->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Resource::NATIONALITY_SELECT[$resource->nationality] ?? '' }}
                            </td>
                            <td>
                                {{ App\Resource::MARITAL_STATUS_SELECT[$resource->marital_status] ?? '' }}
                            </td>
                            <td>
                                {{ $resource->fiscal_code ?? '' }}
                            </td>
                            <td>
                                {{ $resource->vat_number ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $resource->company_partner ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $resource->company_partner ? 'checked' : '' }}>
                            </td>
                            <td>
                                <span style="display:none">{{ $resource->protected_categories ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $resource->protected_categories ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $resource->disability_percentage ?? '' }}
                            </td>
                            <td>
                                {{ $resource->ice_person ?? '' }}
                            </td>
                            <td>
                                {{ $resource->ice_phone ?? '' }}
                            </td>
                            <td>
                                {{ $resource->ice_email ?? '' }}
                            </td>
                            <td>
                                {{ $resource->address_street ?? '' }}
                            </td>
                            <td>
                                {{ $resource->address_city ?? '' }}
                            </td>
                            <td>
                                {{ $resource->address_postalcode ?? '' }}
                            </td>
                            <td>
                                {{ $resource->address_country->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Resource::ADDRESS_STATE_SELECT[$resource->address_state] ?? '' }}
                            </td>
                            <td>
                                {{ $resource->work_phone ?? '' }}
                            </td>
                            <td>
                                {{ $resource->home_phone ?? '' }}
                            </td>
                            <td>
                                {{ $resource->office_phone ?? '' }}
                            </td>
                            <td>
                                {{ $resource->home_email ?? '' }}
                            </td>
                            <td>
                                {{ $resource->work_email ?? '' }}
                            </td>
                            <td>
                                {{ $resource->other_email ?? '' }}
                            </td>
                            <td>
                                @can('resource_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.resources.show', $resource->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('resource_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.resources.edit', $resource->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('resource_delete')
                                    <form action="{{ route('admin.resources.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('resource_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.resources.massDestroy') }}",
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
  let table = $('.datatable-Resource:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
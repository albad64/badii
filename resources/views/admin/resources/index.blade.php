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
<<<<<<< HEAD
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Resource">
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
                        {{ trans('cruds.resource.fields.alt_address_street') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.alt_address_city') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.alt_address_postalcode') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.alt_address_country') }}
                    </th>
                    <th>
                        {{ trans('cruds.resource.fields.alt_address_state') }}
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::STATUS_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::TITLE_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::GENDER_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($countries as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::NATIONALITY_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::MARITAL_STATUS_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($countries as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="search" strict="true">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach(App\Resource::ADDRESS_STATE_SELECT as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
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
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                        <select class="search">
                            <option value>{{ trans('global.all') }}</option>
                            @foreach($countries as $key => $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                    </td>
                    <td>
                    </td>
                </tr>
            </thead>
        </table>
=======
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
>>>>>>> quickadminpanel_2020_06_28_07_35_51
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('resource_delete')
<<<<<<< HEAD
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
=======
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.resources.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
<<<<<<< HEAD
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
=======
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
>>>>>>> quickadminpanel_2020_06_28_07_35_51
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

<<<<<<< HEAD
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.resources.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'resource_code', name: 'resource_code' },
{ data: 'first_name', name: 'first_name' },
{ data: 'last_name', name: 'last_name' },
{ data: 'hired_date', name: 'hired_date' },
{ data: 'termination_date', name: 'termination_date' },
{ data: 'status', name: 'status' },
{ data: 'title', name: 'title' },
{ data: 'photo', name: 'photo', sortable: false, searchable: false },
{ data: 'gender', name: 'gender' },
{ data: 'birth_date', name: 'birth_date' },
{ data: 'birth_city', name: 'birth_city' },
{ data: 'birth_country_name', name: 'birth_country.name' },
{ data: 'nationality', name: 'nationality' },
{ data: 'marital_status', name: 'marital_status' },
{ data: 'fiscal_code', name: 'fiscal_code' },
{ data: 'vat_number', name: 'vat_number' },
{ data: 'company_partner', name: 'company_partner' },
{ data: 'protected_categories', name: 'protected_categories' },
{ data: 'disability_percentage', name: 'disability_percentage' },
{ data: 'ice_person', name: 'ice_person' },
{ data: 'ice_phone', name: 'ice_phone' },
{ data: 'ice_email', name: 'ice_email' },
{ data: 'address_street', name: 'address_street' },
{ data: 'address_city', name: 'address_city' },
{ data: 'address_postalcode', name: 'address_postalcode' },
{ data: 'address_country_name', name: 'address_country.name' },
{ data: 'address_state', name: 'address_state' },
{ data: 'work_phone', name: 'work_phone' },
{ data: 'home_phone', name: 'home_phone' },
{ data: 'office_phone', name: 'office_phone' },
{ data: 'home_email', name: 'home_email' },
{ data: 'work_email', name: 'work_email' },
{ data: 'other_email', name: 'other_email' },
{ data: 'alt_address_street', name: 'alt_address_street' },
{ data: 'alt_address_city', name: 'alt_address_city' },
{ data: 'alt_address_postalcode', name: 'alt_address_postalcode' },
{ data: 'alt_address_country_name', name: 'alt_address_country.name' },
{ data: 'alt_address_state', name: 'alt_address_state' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 4, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Resource').DataTable(dtOverrideGlobals);
=======
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Resource:not(.ajaxTable)').DataTable({ buttons: dtButtons })
>>>>>>> quickadminpanel_2020_06_28_07_35_51
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
<<<<<<< HEAD
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
});
=======
  
})
>>>>>>> quickadminpanel_2020_06_28_07_35_51

</script>
@endsection